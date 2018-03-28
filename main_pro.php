  <?php
     include'all.php';
  ?>
  <style>

      .li-hover:hover{

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

      @media only screen and (max-width:600px){
          .prod-img{
              width:100px !important;
              height:100px !important;
          }
      }

      @media only screen and (max-width:400px){
        .font-head{
            font-size: 14px !important;
        }
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
                        $storequery="SELECT * FROM store ORDER BY pro_id DESC ";
                        $storequery_run=mysqli_query($con,$storequery);
                        $nocount=mysqli_num_rows($storequery_run);
                    ?>
                    <!-- /.row -->
                    <div class="row" style="margin:10px -7px; ">
                        <div class="col-md-7 col-md-offset-1 forum">
                            <div class="box box-primary" style="border-top-color:#d2d6de;">
                                <div class="box-header with-border bg-title" style="">
                                    <h3 class="box-title" style="color:white;">Products to sell in G-Store </h3>
                                </div>

                                <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                        <?php
                                        while($store_rows=mysqli_fetch_assoc($storequery_run))
                                        {
                                            ?>
                                            <li class="item">
                                                <div>
                                                    <div class="product-img">
                                                        <img class ="prod-img" src="images/products/<?php
                                                        if(file_exists('images/products/'.$store_rows['pro_id'].'.jpg'))
                      	                                 {
                                                             echo $store_rows['pro_id'];
                      	                                 }
                                                         else
                      	                                 {
                                                             echo 'defaultnew';
                                                         }
                                                         ?>.jpg" style="width:200px;height:200px;" alt="Product Image">
                                                     </div>
                                                     <div class="product-info" style="margin-left:115px;">
                                                         <img class="user-image" style="border-radius:50%;margin-left:10px;" src='images/users/<?php if(file_exists('images/users/'.$store_rows['id'].'.jpg')){echo $store_rows['id'];}else{echo 'default';}?>.jpg' height='30' width='30' border='1px'>
                                                         <a class="font-head" style="color:grey;font-size:17px;" href="profile.php?id=<?php echo $store_rows['id'];?>">
                                                             <?php echo '<b>'.$store_rows['name'].'</b><span class="hidden-xs">is selling</span>'; ?>
                                                         </a>
                                                         <br>
                                                         <?php $id=$store_rows['pro_id']; ?>
                                                         <a href="view_pro.php?id= <?php echo $id; ?>" class="product-title font-head" style="margin-left:10px;font-size:17px;"><?php echo $store_rows["pro_name"]; ?>
                                                             <span class="label pull-right " style="font-size:13px;color:#999999;"><?php echo $store_rows["datetime"]; ?></span>
                                                         </a>
                                                         <span class="product-description" style="padding-left:10px;font-size:14px;">
                                                             <?php echo $store_rows["detail"]; ?>
                                                         </span>
                                                     </div>
                                                     <br><br><br>
                                                     <div style="margin-left:115px;">
                                                         <span style="margin-left:10px;margin-top:3px;font-size:14px;" class="label label-success pull-left"><span class="hidden-xs">Price:</span> Rs.<?php echo $store_rows["price"];?></span>&nbsp
                                                         <span style="margin-left:10px;margin-top:3px;font-size:14px;margin-left:5px" class="label label-danger pull-left">In Stock</span>
                                                     </div>
                                                 </div>
                                             </li>
                                             <?php
                                         }
                                         ?>

                                     </ul>
                                 </div>

                             </div>

                         </div>
                         <div class="col-md-3 forum2" style="">
                             <div class="box box-default">
                                 <div class="box-header with-border bg-title" style="">
                                     <h3 class="box-title" style="color:white;">G-Store</h3>
                                 </div>

                                 <div class="box-footer text-center" style="padding:50px">
                                     <a href="create_pro.php"><button type="button" class="btn btn-success">Sell your product</button></a>
                                 </div>

                             </div>

                         </div>
                     </div>
                 </section>
             </div>
  <?php
     include'footer.php';
  ?>
