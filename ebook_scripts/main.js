function bookSearch() {
  var search = document.getElementById('search').value;
  document.getElementById('contents').innerHTML = "";
  console.log(search)
  $.ajax({
    url : "https://www.googleapis.com/books/v1/volumes?q=" + search,
    dataType : "json",
    success : function(data) {
      for(i = 0;i < data.items.length; i++){
        contents.innerHTML += '<tr class="listview"> <td style="padding:15px 0px 15px 0px;"> <a href="'+ data.items[i].volumeInfo.previewLink +'" title=""> <img src="'+ data.items[i].volumeInfo.imageLinks.smallThumbnail +'" class="img-responsive voc_list_preview_img" alt="" title=""></a> </td> <td style="width: 50%; padding:15px 15px 15px 15px;"> <a href="'+ data.items[i].volumeInfo.previewLink +'" title=""> <h3 class="nomargin_top">'+ data.items[i].volumeInfo.title +'</h3><br> </a><p>'+data.items[i].volumeInfo.description +'</p> </td> <td style="width:10%;"> <h4 class="nomargin_top">Cateogary : '+ data.items[i].volumeInfo.categories +'</h4> <h4 class="nomargin_top">Authors : '+ data.items[i].volumeInfo.authors + '</h4> <h4 class="nomargin_top">Pages : '+ data.items[i].volumeInfo.pageCount +'</h4> </td> </tr>';
      }
    },
    type : 'GET'
  });
}
document.getElementById('search').addEventListener("input", bookSearch);
document.getElementById('button').addEventListener('click', bookSearch, false)
