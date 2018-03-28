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
        <div class="modal fade bd-example-modal-lg error1" id="error1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg1">
          <div class="modal-content" style="width:100%:">
              <div class="modal-header">
                <h3 class="modal-title" >Fill all the details</h3>
              </div>
              <div class="modal-body xsfonts" style="" id="folist2">
                             Fill all the details
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
              </div>
          </div>
          </div>
         </div>
         <div class="modal fade bd-example-modal-lg error2" id="error2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg1">
           <div class="modal-content" style="width:100%:">
               <div class="modal-header">
                 <h3 class="modal-title" >Fill the details correctly</h3>
               </div>
               <div class="modal-body xsfonts" style="" id="folist2">
                              Fill all the details correctly
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-default" style="font-size:15px;" data-dismiss="modal">Close</button>
               </div>
           </div>
           </div>
          </div>
      <?php
      if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
      {

      ?>
    <div class="row" style="background-color:#ecf0f5;height:5px;">

    </div>

      <!-- Main row -->

      <!-- /.row -->
      <div class="row" style="margin:10px -7px; ">
        <!-- Left col -->

        <!-- /.col -->

        <div class="col-md-7 col-md-offset-1 forum">
          <!-- Info Boxes Style 2 -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary" style="border-top-color:#d2d6de;">
            <div class="box-header with-border bg-title" style="">
              <h3 class="box-title" style="color:white;">Your Topic for forum</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div>
                <form class="form-horizontal" id="form1" name="form1" method="post" action="forum_scripts/add_topic.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Topic Name</label>

                  <div class="col-sm-10">
                    <input name="topic" class="form-control" id="inputEmail3" placeholder="Topic name" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Details</label>

                  <div class="col-sm-10">
                    <textarea name="detail" id="detail" class="form-control" rows="3" placeholder="Enter ..." data-gramm="true" data-txt_gramm_id="339cb75d-d563-273c-9de6-b25cc104256f" data-gramm_id="339cb75d-d563-273c-9de6-b25cc104256f" spellcheck="false" data-gramm_editor="true" style="background: transparent none repeat scroll 0% 0% !important; z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s ;"></textarea>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
              </div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 forum2" style="">
          <div class="box box-default">
            <div class="box-header with-border bg-title" style="">
              <h3 class="box-title" style="color:white;">Other Forums you may like</h3>


            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
            <!-- /.users-list -->
            <div class="box-footer text-center" style="padding:50px">
              <a href="main_forum.php"><button type="button" class="btn btn-success">View all Forum</button></a>
            </div>
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
            <!- - /.footer -->
          </div>
          <!-- /.box -->
      </div>
      </div>
      <!-- /.row -->
      <?php
      }
      else {

      }
      ?>
      <br>
      <br>
      <br>
      <br>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
   include'footer.php';

?>
<script>
//shortcut for $(document).ready
var hash = window.location.hash;
     if (hash.substring(1) == 'error'){
        $(hash).modal('toggle');
    }
    if(hash.substring(1) == 'error1'){
        $(hash).modal('toggle');
    }
    if(hash.substring(1) == 'error2'){
        $(hash).modal('toggle');
    }
</script>
