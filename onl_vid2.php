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

    @media only screen and (max-width: 500px)
    {
        .iframec{
            height:auto;
            width:250px ;
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
      $playlistId=$_GET['id'];
      $api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=".$playlistId."&key=AIzaSyA9-ttARHXG6yV6dfgzav51-lcHDtBo1Bo&maxResults=50";
      $data=json_decode(file_get_contents($api_url));
      ?>
      <script type="javascript">
      $(document).ready(function () {
        $('.vid-item').each(function(index){
          $(this).on('click', function(){
            var current_index = index+1;
            $('.vid-item .thumb').removeClass('active');
            $('.vid-item:nth-child('+current_index+') .thumb').addClass('active');
          });
        });
      });
      </script>
      <!-- Main row -->

      <!-- /.row -->
      <div class="row" style="margin:10px -7px; ">
        <!-- Left col -->

        <!-- /.col -->

        <div class="col-md-10 col-md-offset-1 forum">
          <!-- Info Boxes Style 2 -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary" style="border-top-color:#d2d6de;">
            <div class="box-header with-border bg-title" style="">
              <h3 class="box-title" style="color:white;">Online Video Lecture</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="col-md-7 col-md-offset-2">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="users/default.jpg" alt="User Image">
                <span class="username"><a href="#"><?php echo $_GET['name'];?></a></span>
                <span class="description">Shared publicly</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body text-center">
              <div class="vid-container">
              <iframe class="iframec" id="vid_frame" style="margin-left:0px;" width="100%" height="360px" src="https://www.youtube.com/embed/<?php echo $data->items[0]->snippet->resourceId->videoId;?>" frameborder="0"></iframe>
              </div>
              <p></p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <?php
                foreach($data->items as $video)
                {
                  $title=$video->snippet->title;
                  $description=$video->snippet->description;
                  $thumbnail=$video->snippet->thumbnails->high->url;
                  $videoId=$video->snippet->resourceId->videoId;
                  $date=$video->snippet->publishedAt;
              ?>
              <div class="box-comment">
                <!-- User image -->
                <img class="img-md" src="<?php echo $thumbnail?>"  alt="User Image">

                <div class="comment-text">
                      <span class="username">
                        <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='https://youtube.com/embed/<?php echo $videoId;?>'"><?php echo $title; ?></a>
                        <span class="text-muted pull-right"><?php echo $date; ?></span>
                      </span><!-- /.username -->
                  <?php //echo $description; ?>
                </div>
                <!-- /.comment-text -->
              </div>
              <?php } ?>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
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
