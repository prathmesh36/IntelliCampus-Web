<html>
<head>
<title> Leave </title>

</head>
<body>
<form action="leave.php" method="POST">
Leave Type <select name="leave_type" id="leave_type">
<option value="0"> Select </option>
<option value="Casual Leave"> Casual Leave </option>
<option value="Sick Leave"> Sick Leave </option>
</select>
<br>
From <input type="date" name="fromDate"/><br>
To <input type="date" name="toDate" value=""/><br>
Reason <textarea name="reasons"></textarea><br>
<input type="submit" value="Submit" name="submit">

</form>
</body>

</html>
