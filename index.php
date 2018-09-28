<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>How to Use Webcam In PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
        <div class="row">Tutorial at <a href="http://www.vivekmoyal.in/how-to-use-webcam-in-php-using-html5-and-save-image-to-database/">www.vivekmoyal.in</a></div>
        <div class="col-md-6">
            <div class="text-center">
        <div id="camera_info"></div>
    <div id="camera"></div><br>

    <div class="col-md-12">
      <div class="input-group block">
        <span class="input-group-addon">
          <button id="take_snapshots" class="btn btn-success btn-xs">Take Snapshots</button>
        </span>

        <input type="text" class="form-control" placeholder="enter image title text" id="image_title_text">

      </div>

    </div>

      </div>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th><th>Image Name</th>
                </tr>
            </thead>
            <tbody id="imagelist">

            </tbody>
        </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
<style>
#camera {
  width: 100%;
  height: 350px;
}

</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);

  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();

    snapshot.upload({api_url: "action.php?image_title_text=" +$('#image_title_text').val()}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}
</script>
