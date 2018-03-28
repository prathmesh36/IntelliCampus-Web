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
        /*//$page_id1=$_GET['page_id'];
        $storequery="SELECT * FROM qp";
        $storequery_run=mysqli_query($con,$storequery);
        $nocount=mysqli_num_rows($storequery_run);*/
      ?>

      <!-- Main row -->

      <!-- /.row -->
      <div class="row" style="margin:10px -7px; ">
        <!-- Left col -->

        <!-- /.col -->
        <!-- Info Boxes Style 2 -->
        <div>
              <b>Powered by NPTEL, HRD Ministry Initiative</b><br>
              <img src="nptel.png" >
        </div>
        <div class="col-md-12">
          <!-- Info Boxes Style 2 -->
          <!-- PRODUCT LIST -->
          <div class="box box-primary" style="border-top-color:#d2d6de;">
            <div class="box-header with-border bg-title" style="">
              <h3 class="box-title" style="color:white;">Online Video Lecture</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              $channelId="UC640y4UvDAlya_WOj5U4pfA";
              $access_token="AIzaSyA9-ttARHXG6yV6dfgzav51-lcHDtBo1Bo";
              $api_url = "https://www.googleapis.com/youtube/v3/playlists?maxResults=50&part=snippet&channelId=".$channelId."&key=".$access_token;
              $data=json_decode(file_get_contents($api_url));
              ?>
                <?php
                $count=0;
                foreach($data->items as $playlist)
                {
                  $image=$playlist->snippet->thumbnails->default->url;
                  $title=$playlist->snippet->title;
                  $channel=$playlist->snippet->channelTitle;
                  $playid=$playlist->id;
                  if($count%3==0)
                {
                  echo'<div class="row">';
                }
                $count++;
                ?>
                <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user-2 center-block text-center" style="padding-left:10px;  :height:230px;">
            <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header" style="height:200px;width:auto;padding:0;">
<img width="auto" height="200" src="<?php echo $image;?>">
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li><a href="<?php echo 'onl_vid2.php?id='.$playid."&name=".$title;?>"><?php echo $title;?><span class="pull-right badge bg-blue"></span></a></li>
                      </ul>
                    </div>

                  </div>
          <!-- /.widget-user -->
                </div>
                <?php
                if($count%3==0)
                {
                    echo '</div>';
                }
              }
                ?>

            <!-- /.box-body -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
   include'footer.php';

?>
