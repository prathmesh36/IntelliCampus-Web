# code referred from geeksforgeeks
import mysql.connector
from mysql.connector import MySQLConnection
d = 256


# text  -> text tern
# ref  -> text
# q    -> A prime number

def search(text, ref, q):
    copy = 0
    M = len(text)
    N = len(ref)
    i = 0
    j = 0
    p = 0  # hash value for text tern
    t = 0  # hash value for ref
    h = 1

    # The value of h would be "pow(d, M-1)%q"
    for i in xrange(M - 1):
        h = (h * d) % q

    # Calculate the hash value of text tern and first window
    # of text
    for i in xrange(M):
        p = (d * p + ord(text[i])) % q
        t = (d * t + ord(ref[i])) % q

    # Slide the text tern over text one by one
    for i in xrange(N - M + 1):
        # Check the hash values of current window of text and
        # text tern if the hash values match then only check
        # for characters on by one
        if p == t:
            # Check for characters one by one
            for j in xrange(M):
                if ref[i + j] != text[j]:
                    break

            j += 1
            # if p == t and text[0...M-1] = ref[i, i+1, ...i+M-1]
            if j == M:
                copy += 1

        # Calculate hash value for next window of text: Remove
        # leading digit, add trailing digit
        if i < N - M:
            t = (d * (t - ord(ref[i]) * h) + ord(ref[i + M])) % q

            # We might get negative values of t, converting it to
            # positive
            if t < 0:
                t = t + q
    return copy


#Driver program to test the above function
connection = mysql.connector.Connect(host="localhost", database="assignment", user="root", password="")
cur = connection.cursor(buffered=True)
cur2 = connection.cursor(buffered=True)
cur3 = connection.cursor(buffered=True)
cur.execute("select * from assignments;")
cur2.execute("select * from assignments;")
rows1 = cur.fetchall()
rows2 = cur2.fetchall()
common_words = open("common words.txt", 'r')
common_words = common_words.read().split('\n')
for i in rows1:
    copy = 0
    copy_percent_dict = {}
    name1 = i[0]
    email = i[1]
    rollno = i[2]
    subject = i[3]
    file1 = open("Assignments_uploads/" + str(rollno) + subject + ".txt", 'r')
    text = file1.read().lower()
    arr = text.split('\n')
    text = ''
    max_percent = 100
    max_rollno = None
    max_subject = None
    max_name = None
    for word in arr:
        if word not in common_words:
            text += word.strip() + ' '
    list_text = text.split(' ')
    copy_len = len(list_text)
    list_test = list(set(list_text))
    for j in rows2:
        name2 = j[0]
        rollno2 = j[2]
        subject2 = j[3]
        if rollno2 != rollno:
            if subject == subject2:
                print "%d %d" % (rollno, rollno2)
                file2 = open("Assignments_uploads/" + str(rollno) + subject + ".txt", 'r')
                ref = file2.read().lower()
                arr = ref.split('\n')
                ref = ''
                for word in arr:
                    ref += word.strip() + ' '
                for text in list_text:
                    # A random prime number (greater the value more accurate predictions)
                    q = 101
                    # iterating over all values and finding same word count from the above texts
                    copy += search(text, ref, q)
                    # calculating the overall percentage of same text from the overall text (here 80% is used instead of
                    # 100 since there
                    # might be some noise associated with the text data also it acts as a negative bias for more info
                    # refer )
                print copy
                percent = float(copy) / copy_len * 100
                print percent
                if percent > 100:
                    percent = 100;
                if max_percent > percent:
                    max_percent = percent
                    max_name = name2
                    max_rollno = rollno2
                    max_subject = subject2
    if rollno != rollno2:
        plagarised_label = None
        if max_percent <= 60:
            plagarised_label = 'not copied'
        elif max_percent > 60 and max_percent <= 70:
            plagarised_label = 'partially'
        else:
            plagarised_label = 'copied'
        str1 = "INSERT INTO `Plagarised` (`Name`, `roll_no`, `subject`, `plagarised_from`, `percentage_similiarity`, `plagarised_from_rollno`, `plagarised_label`) VALUES ('"+name1+"', '"+str(rollno)+"', '"+subject+"', '"+name2+"', '"+str(max_percent)+"', '"+str(rollno2)+"', '"+plagarised_label+"')"
        cur3.execute(str1)
