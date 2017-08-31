<!DOCTYPE html>
<!--based on code from https://bootsnipp.com/snippets/p1qAD by Shuvendu Dhenki -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      .gal {
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 3;
      } 
      .gal img{ width: 100%; padding: 7px 0;}
      @media (max-width: 500px) {
        .gal {
          -webkit-column-count: 1; /* Chrome, Safari, Opera */
          -moz-column-count: 1; /* Firefox */
          column-count: 1;
        }
      }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        getPhotos();
      });

      function getPhotos(){
        var url = 'images.php';
        $.post( url, function( data ) {
          var imgs = data.split("\n");
          imgs.forEach(function(i){
            $("#gal").append('<img src="photos/'+i+'" alt="">');
          });
        });
      }
    </script>

  </head>
  <body>
    <div class="container">
      <h1>Gallery</h1>
      <div class="col-md-12">
        <div class="row">
          <hr>
          <div class="gal" id="gal">
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    </script>
  </body>
</html>
