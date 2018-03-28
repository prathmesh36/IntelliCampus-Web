<?php
require 'all.php';
?>
<div class="content-wrapper">

    <div class="col-md-12" style="padding-left:10px;padding-right:10px;">
      <div class="box boxzol" style="">
        <div class="box-header with-border bg-title2" style="">
          <h2 class="box-title" style="font-size:22px;color:Black;">E-Books</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <?php
           include 'ebook_scripts/books.php';
           ?>
         </div>
        </div>
        </div>
      </div>
 </div>
<?php
require 'footer.php';
?>
