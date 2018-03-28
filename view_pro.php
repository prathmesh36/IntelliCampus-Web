<?php
   include'all.php';
?>
<style>
    @media only screen and (min-width: 900px) {
        .commentsec{
            padding-right:78px;
        }
    }
    .bg-title{
      background: rgba(221,75,57,1);
      background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(59%, rgba(221,75,57,1)), color-stop(97%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
      background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      background: linear-gradient(to right, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 59%, rgba(241,111,92,1) 97%, rgba(241,111,92,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dd4b39', endColorstr='#f16f5c', GradientType=1 );
    }

    .bg-title2{
      background: rgba(221,75,57,1);
      background: -moz-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(221,75,57,1)), color-stop(0%, rgba(221,75,57,1)), color-stop(27%, rgba(221,75,57,1)), color-stop(90%, rgba(241,111,92,1)), color-stop(100%, rgba(241,111,92,1)));
      background: -webkit-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -o-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
      background: -ms-linear-gradient(left, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 0%, rgba(221,75,57,1) 27%, rgba(241,111,92,1) 90%, rgba(241,111,92,1) 100%);
    }

    @media only screen and (max-width: 990px) {
        .pm, .pro-box{
          border-bottom:solid 1px silver;
          padding-bottom: 10px;
        }

        .boxzol{
          margin-bottom:20px;
        }

        .forum{
          margin-left:5px;
          margin-right:5px;
        }

        .forum2{
          margin-left:5px;
          margin-right:5px;
        }

        .topinfo{
          margin-left:2px;
          margin-right:2px;

        }



    }
    @media only screen and (min-width: 990px) {
      .pm{
        border-right:solid 1px silver;
      border-left:solid 1px silver;
      }

      .boxzol{
        margin-bottom:10px;
      }

      .topinfo{
        margin-left:10px;
        margin-right:10px;

      }

      .forum2{
        padding-left: 0px;
      }
    }

</style>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <section class="content">
    <div class="row" style="background-color:#ecf0f5;height:5px;">

    </div>
    <?php
      //$page_id1=$_GET['page_id'];
      @$id=mysqli_real_escape_string($con,$_GET['id']);
      $storequery="SELECT * FROM store WHERE pro_id='".mysqli_real_escape_string($con,$id)."' ";
      $storequery_run=mysqli_query($con,$storequery);
      $rows=mysqli_fetch_array($storequery_run);
      $nocount=mysqli_num_rows($storequery_run);
      if(file_exists('images/products/'.$rows['pro_id'].'.jpg'))
      {
          $pro_img=$rows['pro_id'];
      }else
      {
          $pro_img='defaultnew';
      }
      if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
      {
    ?>

      <!-- Main row -->

      <!-- /.row -->
      <div class="row topinfo">
          <div class="col-md-12" style="padding-left:10px;padding-right:10px;">
              <div class="box boxzol" style="">
                  <div class="box-header with-border bg-title2" style="">
                      <h2 class="box-title" style="font-size:22px;color:white;"><?php echo $rows["pro_name"]?></h2>
                  </div>
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-3 pro-box" style="">
                              <div class="profile-picture text-center" style="margin-top:20px">
                                  <img src="images/products/<?php echo $pro_img?>.jpg"   width="200" height="200">
                              </div>
                          </div>
                          <h3 class="pmh text-center visible-sm visible-xs" style="font-size:20px;"><b>Product Details</b></h3>
                          <div class="pm col-md-5" style="display:flex;justify-content:center;">
                              <div class="pmi profile-info" >
                                  <h4 class="pmh text-center visible-md visible-lg" style="font-size:20px;"><b>Product Details</b></h4>
                                  <span style="font-size:16px;"><b>Name:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["pro_name"];?></span><br>
                                  <span style="font-size:16px;"><b>Seller Name:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["name"];?></span><br>
                                  <span style="font-size:16px;"><b>Email ID:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["email"];?></span><br>
                                  <span style="font-size:16px;"><b>Details</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["detail"];?></span><br>
                                  <span style="font-size:16px;"><b>Price:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["price"];?></span><br>
                                  <span style="font-size:16px;"><b>Subject:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["sub"];?></span><br>
                                  <span style="font-size:16px;"><b>Contact No:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["phone"];?></span><br>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="box " style="border-top:0;">
                                  <div class="box-header text-center">
                                      <h3 class="box-title" style="font-size:20px;"><b>Other Products you may Like</b></h3>
                                  </div>
                                  <div class="box-body no-padding">
                                      <ul class="users-list clearfix">
                                          <?php
                                          $sug="SELECT * FROM store ORDER BY RAND() LIMIT 4";
                                          $sug_run=mysqli_query($con,$sug);
                                          $sug_count=mysqli_num_rows($sug_run);
                                          while($sug_query=mysqli_fetch_assoc($sug_run))
                                          {
                                          ?>
                                        <li>
                                          <img src="images/products/<?php
                                          if(file_exists('images/products/'.$sug_query['pro_id'].'.jpg'))
                                                  {
                                                    echo $sug_query['pro_id'];
                                                  }else
                                                  {
                                                    echo 'defaultnew';
                                                  }
                                                  ?>.jpg" alt="User Image">
                                          <a class="users-list-name" href="<?php echo 'view_pro.php?id='.$sug_query['pro_id'] ;?>"><?php echo $sug_query['pro_name'];?></a>
                                          <span class="users-list-date"><?php echo $sug_query['price'].' Rs ';?></span>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                      </ul>
                                  </div>
                                  <div class="box-footer text-center">
                                      <a href="main_pro.php" class="uppercase">View All Products</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="box-footer">
                      <div class="row">
                          <div class="col-lg-9 col-sm-12 col-xs-12">
                              <div class="description-block commentsec" style="padding-left:20px;">
                                  <h5 class="description-header text-green" style="text-align:left;margin-left:5px;"><i class="fa fa-commenting"></i> &nbspReply</h5>
                                  <br>
                                  <div class="box-footer box-comments">
                                      <?php
                                      $tbl_name2="store_answer"; // Switch to table "forum_answer"
                                      $sql2="SELECT * FROM $tbl_name2 WHERE question_id='".mysqli_real_escape_string($con,$id)."'";
                                      $result2=mysqli_query($con,$sql2);
                                      while($rows=mysqli_fetch_array($result2)){
                                          ?>
                                          <div class="box-comment">
                                              <img class="img-circle "  src='images/users/<?php if(file_exists('images/users/'.$rows['id'].'.jpg')){echo $rows['id'];}else{echo 'default';}?>.jpg' alt="User Image">
                                              <div class="comment-text">
                                                  <span style="text-align:left;font-size:16px;" class="username">
                                                      &nbsp <?php echo $rows['a_name']; ?>
                                                      <span style="font-size:14px;" class="text-muted pull-right"><?php echo $rows['a_datetime']; ?></span>
                                                  </span><!-- /.username -->
                                                  <span style="font-size:15px;text-align:left;margin-left:10px;font-weight:normal;" class="username"><?php echo $rows['a_answer'];?></span>
                                              </div>
                                          </div>
                                          <?php
                                    }
                                    ?>
                                </div>
                                <span class="description-text">
                                    <form name="form1" method="post" action="estore_scripts/add_reply.php">
                                        <textarea name="a_answer" id="a_answer" class="form-control" rows="3" placeholder="Enter ..." data-gramm="true" data-txt_gramm_id="339cb75d-d563-273c-9de6-b25cc104256f" data-gramm_id="339cb75d-d563-273c-9de6-b25cc104256f" spellcheck="false" data-gramm_editor="true" style="background: transparent none repeat scroll 0% 0% !important; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s ;"></textarea>
                                        <input name="id" type="hidden" value="<?php echo $id; ?>">
                                        <br><input type="submit" name="Submit" value="Post" class="btn btn-default btn-flat" style="background-color:green;color:white;">
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php
    }
    else
    {
      //echo '<h2>Please Login to Access the G-Store</h2>';
    }
    //require 'commentbox.php';
    ?>
</div>
<?php
   include'footer.php';
?>
