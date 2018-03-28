    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="ebook_scripts/main.css">
    <center>
        <h1>Book finder</h1></center>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <p><small class="text-muted">Click and Search for books</small></p>
                    <input class="form-control input-lg" id="search" placeholder="Searchin text" type="text">
                    <br>
                    <center>
                        <input type="button" id="button" value="Search" class="btn btn-primary btn-outline btn-lg">
                    </center>
                </div>
            </div>
        </div>
        <div class="box" style="margin-left:10px;margin-right:10px;">
                    <div class="box-header">
                      <h3 class="box-title">Search Result</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tbody><tr>
                          <th style="width:15%;">Thumbnail</th>
                          <th style="width:65%;">Book Info</th>
                          <th style="width:20%;">Related Content</th>
                        </tr>
                      </tbody>
                    <tbody id="contents">

                    </tbody>
                    </table>
                    </div>
                    <!-- /.box-body -->
        </div>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="ebook_scripts/main.js" charset="utf-8"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
