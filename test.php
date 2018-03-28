<?php
require 'assets/backend/data.php';
?>
  <link rel="stylesheet" href="assets/css/style.css">
<style>

  .ui-autocomplete-category {

    font-weight: bold;

    padding: .2em .4em;

    margin: .8em 0 .2em;

    line-height: 1.5;

  }

</style>
<script type="text/javascript">
  $.widget( "custom.catcomplete", $.ui.autocomplete, {

    _create: function() {

      this._super();

      this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );

    },

    _renderMenu: function( ul, items ) {

      var that = this,

        currentCategory = "";

      $.each( items, function( index, item ) {

        var li;

        if ( item.category != currentCategory ) {

          ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );

          currentCategory = item.category;

        }

        li = that._renderItemData( ul, item );

        if ( item.category ) {

          li.attr( "aria-label", item.category + " : " + item.label );

        }

      });

    }

  });

  </script>
  <script type="text/javascript">

  $(function() {
    var data = [
  <?php
  /*if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
    {*/
    $query_s="SELECT * FROM login";
    $querys_run=mysqli_query($con,$query_s);
    while($query3_array=mysqli_fetch_assoc($querys_run))
    {
    echo '{label : "'.$query3_array['firstname'].' '.$query3_array['surname'].'", category: "People" },';

    }



  ?>

    ];



    $( "#tags" ).catcomplete({

      delay: 0,

      source: data

    });

   });

  </script>
<form class="form-wrapper cf" action="search.php">
  <img src="1.png" height="45" width="45" style="position:relative;left:-630px;" class="ico">
  <input type="text" placeholder="Search here for your friends..." id="tags" name="search_text">
  <button type="submit">Search</button>
</form>
