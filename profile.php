<?php
  include'all.php';
?>

<style>
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
<?php
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {
    if(isset($_GET["id"]) && !empty($_GET["id"]))
    {
      $user_id=$_GET['id'];
      $query="SELECT * FROM login WHERE id='".$user_id."'";
      $query_run=mysqli_query($con,$query);
      $rows=mysqli_fetch_assoc($query_run);
    }
?>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg1">
      <div class="modal-content" style="width:100%:">
        <div class="modal-header">
          <h3 class="modal-title" >People following <?php echo $rows["firstname"].' '.$rows["surname"];?></h3>
        </div>
        <div class="modal-body xsfonts" style="" id="folist"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg1">
      <div class="modal-content" style="width:100%:">
        <div class="modal-header">
          <h3 class="modal-title" >Poeple Followed by <?php echo $rows["firstname"].' '.$rows["surname"];?>'s </h3>
        </div>
        <div class="modal-body xsfonts" style="" id="folist2"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function modalfunc(type)
    {
      var divlist;
      if(type==1)
      {
        divlist = document.getElementById('folist');
      }
      else {
        divlist = document.getElementById('folist2');
      }
      while (divlist.firstChild) {
        divlist.removeChild(divlist.firstChild);
      }
      var xmlhttp=new XMLHttpRequest();
      if(type==1)
      {
        xmlhttp.open("GET","followlist.php?id="+<?php echo $user_id; ?>,false);
      }
      else {
        xmlhttp.open("GET","followinglist.php?id="+<?php echo $user_id; ?>,false);
      }
      xmlhttp.send(null);
      var userdata=xmlhttp.responseText;
      var userarr = userdata.split("/");
      for(i=0;i<userarr.length-1;i++)
      {
        var a = document.createElement('div'),
        img = document.createElement('img'),
        span =document.createElement('span'),
        button =document.createElement('button');
        a.class="row";
        a.style="padding:10px;"
        var subuser=userarr[i].split("~");
        span.innerHTML=subuser[1];
        span.style="margin-left:10px;";
        var uid=subuser[0];
        if(subuser[0].substring(0,7)=="default")
        {
          uid=subuser[0].substring(7);
          subuser[0]="default";
        }
        img.src='images/users/'+subuser[0]+'.jpg';
        img.height="50";
        img.width="50";
        button.id="button"+uid;
        button.type="button";
        button.style="background:green;color:white;float:right;margin-top:10px;"
        button.class="btn btn-success";
        button.innerHTML=subuser[2];
        var currbutton= document.getElementById("button"+uid);
        button.addEventListener("click", function(){followinc(this.id);}, false);
        a.appendChild(img);
        a.appendChild(span);
        if(subuser[2]!="")
          a.appendChild(button);
        divlist.appendChild(a);
      }
    }

    function followinc(id)
    {
      var xmlhttp=new XMLHttpRequest();
      xmlhttp.open("GET","followajax.php?id="+id.substring(6),false);
      xmlhttp.send(null);
      var userdata=xmlhttp.responseText;
      if(userdata=="pass")
      {
        var currbutton=document.getElementById(id);
        currbutton.innerHTML="Following";
      }

    }
  </script>
  
  <div class="content-wrapper">
    <div class="row" style="background-color:#ecf0f5;height:5px;"></div>
    <div class="row topinfo">
      <div class="col-md-12" style="padding-left:10px;padding-right:10px;">
        <div class="box boxzol" style="">
          <div class="box-header with-border bg-title2" style="">
            <h2 class="box-title" style="font-size:22px;color:white;"><?php echo $rows["firstname"].' '.$rows["surname"];?>'s Profile</h2>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <!-- /.col -->
              <div class="col-md-3 pro-box" style="">
                <h3 class="text-center" style="font-size:20px;margin-top:10px"><b><?php echo $rows["firstname"].' '.$rows["surname"];?></b></h3>
                <div class="profile-picture text-center">
                  <img src="images/users/<?php
                  if(file_exists('images/users/'.$user_id.'.jpg'))
                  {
                    echo $user_id;
                  }
                  else
                  {
                    echo 'default';
                  }
                  ?>.jpg" class="img-circle" width="160" height="160">
                  <?php
                  if(!empty($_GET["id"]) && isset($_GET["id"]))
                  {
                  ?>
                    <br>
                    <button style="padding:;background:green;color:white;;margin-top:10px;" id="button<?php echo $user_id;?>" onclick="followinc(this.id);">
                      <?php
                      $u_id=$_GET['id'];
                      $queryf="SELECT * FROM login WHERE id='$u_id'";
                      $queryf_run=mysqli_query($con,$queryf);
                      $queryf_array=mysqli_fetch_assoc($queryf_run);
                      $follow=$queryf_array['follow'];
                      $x= explode(',',$follow);
                      $flag=0;
                      foreach($x as $x_a)
                      {
                        if($x_a==$_SESSION['user_id']){
                          echo 'Following';
                          $flag=1;
                          break;
                        }
                      }
                      if($flag==0)
                      {
                        echo 'Follow';
                      }
                      ?>
                    </button>
                    <?php
                  }
                  ?>
                </div>
              </div>
              <!-- /.col -->
              <h3 class="pmh text-center visible-sm visible-xs" style="font-size:20px;"><b>Personal Memoronda</b></h3>
              <div class="pm col-md-5" style="display:flex;justify-content:center;">
                <div class="pmi profile-info" >
                  <h4 class="pmh text-center visible-md visible-lg" style="font-size:20px;"><b>Personal Memoronda</b></h4>
                  <span style="font-size:16px;"><b>Name:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["firstname"].' '.$rows["surname"];?></span><br>
                  <span style="font-size:16px;"><b>Email ID:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["email"];?></span><br>
                  <span style="font-size:16px;"><b>Gender:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["gender"];?></span><br>
                  <span style="font-size:16px;"><b>Department:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["dept"];?></span><br>
                  <span style="font-size:16px;"><b>Year:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo $rows["year"];?></span><br>
                  <span style="font-size:16px;"><b>Birth Date:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo date("d M Y",strtotime($rows["dob"]));?></span><br>
                  <span style="font-size:16px;"><b>Member Since:</b></span>&nbsp&nbsp&nbsp<span style="font-size:16px;"><?php echo date("M Y",strtotime($rows['doj']));?></span><br>
                </div>
              </div>

              <!-- /.chart-responsive -->
              <div class="col-md-4">
                <!-- USERS LIST -->
                <div class="box " style="border-top:0;">
                  <div class="box-header text-center">
                    <h3 class="box-title" style="font-size:20px;"><b>People you may know</b></h3>

                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                      <?php
                      $people="SELECT * FROM login ORDER BY RAND() LIMIT 4";
                      $people_run=mysqli_query($con,$people);
                      $people_count=mysqli_num_rows($people_run);
                      while($people_query=mysqli_fetch_assoc($people_run))
                      {
                        ?>
                        <li>
                          <img src="images/users/<?php
                          if(file_exists('images/users/'.$people_query['id'].'.jpg'))
                          {
                            echo $people_query['id'];
                          }
                          else
                          {
                            echo 'default';
                          }
                          ?>.jpg" alt="User Image" height="63" width="63">
                          <a class="users-list-name" href="profile.php?id=<?php echo $people_query['id'];?>"><?php echo $people_query['firstname']?></a>
                          <span class="users-list-date"><?php echo $people_query['view'].' Views';?></span>
                        </li>
                        <?php
                      }
                      ?>
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Users</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
                <!--/.box -->
              </div>

            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  <h5 class="description-header text-green"><i class="fa fa-user"></i> &nbspFollowers</h5>
                  <span class="description-text">
                    <?php
                    $follow=$rows['follow'];
                    $x= explode(',',$follow);
                    $a=0;
                    foreach($x as $x_a)
                    {
                      $a++;
                    }
                    $b=$a-1;
                    echo $b.'<br><a href="#" id="followers" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="modalfunc(1);">See all</a>';
                    ?>
                  </span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  <h5 class="description-header text-blue"><i class="fa fa-user"></i> &nbspFollowing</h5>
                  <span class="description-text">
                    <?php
                    $query="SELECT follow FROM login";
                    $query_run=mysqli_query($con,$query);
                    $a=0;
                    while($query_array=mysqli_fetch_assoc($query_run))
                    {
                      $follow=$query_array['follow'];
                      $x= explode(',',$follow);

                      foreach($x as $x_a)
                      {
                        if($x_a==$user_id)
                        {
                          $a++;
                        }
                      }
                    }
                    $b=$a;
                    echo $b.'<br><a href="#" id="followers" data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="modalfunc(2);">See all</a>';
                    ?>
                  </span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  <h5 class="description-header text-red"><i class="fa fa-newspaper-o"></i> &nbspForum Post</h5>
                  <span class="description-text">
                    <?php
                    $forquery="SELECT * FROM forum_question WHERE id='".$user_id."'";
                    $forquery_run=mysqli_query($con,$forquery);
                    echo $nocount=mysqli_num_rows($forquery_run);
                    ?>
                  </span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block">
                  <h5 class="description-header text-yellow"><i class="fa fa-cart-plus"></i> &nbspG-Store Post</h5>
                  <span class="description-text">
                    <?php
                    $storequery="SELECT * FROM store WHERE id = '".$user_id."'";
                    $storequery_run=mysqli_query($con,$storequery);
                    echo $nocount=mysqli_num_rows($storequery_run);
                    ?>
                  </span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row" style="margin:10px -7px; ">
      <!-- Left col -->

      <!-- /.col -->

      <div class="col-md-7 col-md-offset-1 forum">
        <!-- Info Boxes Style 2 -->

        <!-- PRODUCT LIST -->
        <div class="box box-primary" style="border-top-color:#d2d6de;">
          <div class="box-header with-border bg-title" style="">
            <h3 class="box-title" style="color:white;">Forum Created by  <?php echo $rows["firstname"].' '.$rows["surname"];?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <?php
              while($forum_rows=mysqli_fetch_assoc($forquery_run))
              {
                ?>
                <li class="item">
                  <div>
                    <div class="product-img">
                      <img src="images/forum/<?php
                      if(file_exists('images/products/'.$forum_rows['topic_id'].'.jpg'))
                      {
                        echo $forum_rows['topic_id'];
                      }else
                      {
                        echo 'defaultnew';
                      }
                      ?>.jpg" style="width:75px;height:75px;" alt="Product Image">
                    </div>
                    <div class="product-info" style="margin-left:90px;">
                      <a href="view_topic.php?id=<?php echo $forum_rows['topic_id']; ?>" class="product-title" style="font-size:16px;"><?php echo $forum_rows["topic"]; ?>
                        <span class="label pull-right " style="color:#999999;"><?php echo $forum_rows["datetime"]; ?></span>
                      </a>
                      <span class="product-description">
                        <?php echo $forum_rows["detail"]; ?>
                      </span>
                    </div>
                  </div>
                  <br><br>
                  <span style="margin-top:3px;font-size:12px;" class="label label-success pull-left"><?php echo $forum_rows["view"]; ?> </span> <b style="margin-top:3px;">&nbsp Views</b>
                  <span style="margin-top:3px;font-size:12px;margin-left:5px" class="label label-danger "><?php echo $forum_rows["reply"]; ?></span><b style="margin-top:3px;">&nbsp Replies</b>
                </li>
                <?php
              }
              ?>
              <!-- /.item -->
            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="main_forum.php" class="uppercase">View the Complete Forum Page</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 forum2" style="" >
        <div class="box box-default">
          <div class="box-header with-border bg-title" style="">
            <h3 class="box-title" style="color:white;">Most Popular Forum</h3>


          </div>
          <!-- /.box-header -->

          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <ul class="nav nav-pills nav-stacked">
              <?php
              $forquery1="SELECT * FROM forum_question ORDER BY view DESC LIMIT 5";
              $forquery_run1=mysqli_query($con,$forquery1);
              $nocount1=mysqli_num_rows($forquery_run1);
              while($for_query1=mysqli_fetch_assoc($forquery_run1))
              {
                ?>
                <li ><a href="view_topic.php?id=<?php echo $for_query1['topic_id'];?>" style="height:40px;"><?php echo $for_query1['topic'];?>
                  <span class="pull-right text-green"><?php echo $for_query1['view'].' Views';?></span></a>
                </li>
                <?php
              }
              ?>
            </ul>
          </div>
          <!- - /.footer -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
    <div class="row" style="margin:10px -7px; ">
      <!-- Left col -->

      <!-- /.col -->

      <div class="col-md-7 col-md-offset-1 forum">
        <!-- Info Boxes Style 2 -->

        <!-- PRODUCT LIST -->
        <div class="box box-primary" style="border-top-color:#d2d6de;">
          <div class="box-header with-border bg-title" style="">
            <h3 class="box-title" style="color:white;">Products to sell in G-Store by <?php echo $rows["firstname"].' '.$rows["surname"];?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              <?php
              while($store_rows=mysqli_fetch_assoc($storequery_run))
              {
                ?>
                <li class="item">
                  <div>
                    <div class="product-img">
                      <img src="images/products/<?php
                      if(file_exists('images/products/'.$store_rows['pro_id'].'.jpg'))
                      {
                        echo $store_rows['pro_id'];
                      }else
                      {
                        echo 'defaultnew';
                      }
                      ?>.jpg" style="width:100px;height:100px;" alt="Product Image">
                    </div>
                    <div class="product-info" style="margin-left:115px;">
                      <a href="view_pro.php?id=<?php echo $store_rows['pro_id'] ;?>" class="product-title" style="font-size:16px;"><?php echo $store_rows["pro_name"]; ?>
                        <span class="label pull-right " style="color:#999999;"><?php echo $store_rows["datetime"]; ?></span>
                      </a>
                      <span class="product-description">
                        <?php echo $store_rows["detail"]; ?>
                      </span>
                    </div>
                    <br><br><br>
                    <div style="margin-left:115px;">
                      <span style="margin-top:3px;font-size:13px;" class="label label-success pull-left">Price: Rs.<?php echo $store_rows["price"];?></span>&nbsp
                      <span style="margin-top:3px;font-size:13px;margin-left:5px" class="label label-danger pull-left">In Stock</span>
                    </div>
                  </div>
                </li>
                <?php
              }
              ?>
              <!-- /.item -->
            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="main_pro.php" class="uppercase">View All Products</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 forum2" style="">
        <div class="box box-default">
          <div class="box-header with-border bg-title" style="">
            <h3 class="box-title" style="color:white;">G-Store</h3>


          </div>
          <!-- /.box-header -->

          <!-- /.box-body -->
          <div class="box-footer text-center" style="padding:50px">
            <a href="create_pro.php"><button type="button" class="btn btn-success">Sell your product</button></a>
          </div>
          <!- - /.footer -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
}else
{
  echo '<script type="text/javascript">';
  echo 'window.location.href="login.php";';
  echo '</script>';
}
?>
<?php
include'footer.php';

?>
