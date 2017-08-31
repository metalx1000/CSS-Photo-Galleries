<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- based on code from Bootsnipp.com. Bootstrap 3.0.0 Snippet by evarevirus -->
    <title>Gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      /* TODO:
      * clean up!
      * ===============
      * horizontal thumbnails
      * at small screens
      * and in fullscreen
      * ===============
      * create Mixins
      * ===============
      */
      @import "https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400";
      /* colors */
      html {
        width: 100%;
        height: 100%;
      }

      body {
        background: #efefef;
        color: #333;
        font-family: "Raleway";
        height: 100%;
      }
      body h1 {
        text-align: center;
        color: #428BFF;
        font-weight: 300;
        padding: 40px 0 20px 0;
        margin: 0;
      }

      .gallery {
        left: 50%;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        position: relative;
        background: white;
        width: 70%;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        border-radius: 5px;
      }
      .gallery input[name$="control"] {
        display: none;
      }
      .gallery .carousel {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        position: relative;
        height: 70vh;
        width: 100%;
      }
      .gallery .wrap {
        width: 100%;
        height: 100%;
        position: static;
        margin: 0 auto;
        overflow: hidden;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        margin-right: 20px;
      }
      .gallery .wrap figure {
        padding: 10px;
        height: 100%;
        min-width: 100%;
        -webkit-transition: opacity 0.25s ease-in-out 0.05s;
        transition: opacity 0.25s ease-in-out 0.05s;
        position: relative;
        left: 0;
        -webkit-transform: translateX(0%);
        transform: translateX(0%);
        box-sizing: border-box;
        text-align: center;
        margin: 0;
        display: block;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        opacity: 1;
      }
      .gallery .wrap figure label {
        cursor: zoom-in;
        height: auto;
        width: 100%;
        height: 100%;
        position: relative;
        display: block;
      }
      .gallery .wrap figure img {
        cursor: inherit;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        border-radius: 3px;
        margin: 0 auto;
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
      }
      .gallery .thumbnails {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        min-width: 60px;
        max-height: 100%;
        height: auto;
        -webkit-box-flex: 0;
        -ms-flex-positive: 0;
        flex-grow: 0;
        -ms-flex-item-align: center;
        align-self: center;
        -ms-flex-preferred-size: auto;
        flex-basis: auto;
        position: relative;
        white-space: nowrap;
        overflow: hidden;
        overflow-y: auto;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 0 10px;
        z-index: 20;
      }
      .gallery .thumbnails .thumb {
        min-width: 60px;
        height: 60px;
        background-position: center center;
        background-size: cover;
        box-sizing: border-box;
        opacity: 0.7;
        margin: 5px 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        left: 0;
        border-radius: 3px;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        background-repeat: no-repeat;
      }
      .gallery .thumbnails .slider {
        position: absolute;
        display: block;
        width: 5px;
        height: calc(60px + 10px);
        z-index: 2;
        margin: 0;
        left: 0;
        -webkit-transition: all 0.33s cubic-bezier(0.3, 0, 0.33, 1);
        transition: all 0.33s cubic-bezier(0.3, 0, 0.33, 1);
      }
      .gallery .thumbnails .slider .indicator {
        width: 100%;
        height: 30px;
        max-height: calc(100% - 10px);
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        background: #428BFF;
        border-radius: 1px;
      }
      .gallery input#fullscreen:checked ~ .wrap figure {
        position: fixed;
        z-index: 10;
        height: 100vh;
        width: 100vw;
        padding: 0;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%) !important;
        transform: translate(-50%, -50%) !important;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
      }
      .gallery input#fullscreen:checked ~ .wrap figure label {
        cursor: zoom-out;
      }
      .gallery input#fullscreen:checked ~ .wrap figure label img {
        -webkit-animation: shadow 0.2s;
        animation: shadow 0.2s;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        -webkit-animation-direction: forwards;
        animation-direction: forwards;
        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        border-radius: 0;
      }
      .gallery input#image1:checked ~ .wrap figure {
        -webkit-transform: translateX(0);
        transform: translateX(0);
      }
      .gallery input#image1:checked ~ .wrap figure:not(:nth-of-type(1)) {
        opacity: 0;
      }
      .gallery input#image1:checked ~ .thumbnails .slider {
        -webkit-transform: translateY(0);
        transform: translateY(0);
      }
      .gallery input#image1:checked ~ .thumbnails .thumb:nth-of-type(1) {
        opacity: 1;
        cursor: default;
      }
      .gallery input#image2:checked ~ .wrap figure {
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
      }
      .gallery input#image2:checked ~ .wrap figure:not(:nth-of-type(2)) {
        opacity: 0;
      }
      .gallery input#image2:checked ~ .thumbnails .slider {
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
      }
      .gallery input#image2:checked ~ .thumbnails .thumb:nth-of-type(2) {
        opacity: 1;
        cursor: default;
      }
      .gallery input#image3:checked ~ .wrap figure {
        -webkit-transform: translateX(-200%);
        transform: translateX(-200%);
      }
      .gallery input#image3:checked ~ .wrap figure:not(:nth-of-type(3)) {
        opacity: 0;
      }
      .gallery input#image3:checked ~ .thumbnails .slider {
        -webkit-transform: translateY(200%);
        transform: translateY(200%);
      }
      .gallery input#image3:checked ~ .thumbnails .thumb:nth-of-type(3) {
        opacity: 1;
        cursor: default;
      }
      .gallery input#image4:checked ~ .wrap figure {
        -webkit-transform: translateX(-300%);
        transform: translateX(-300%);
      }
      .gallery input#image4:checked ~ .wrap figure:not(:nth-of-type(4)) {
        opacity: 0;
      }
      .gallery input#image4:checked ~ .thumbnails .slider {
        -webkit-transform: translateY(300%);
        transform: translateY(300%);
      }
      .gallery input#image4:checked ~ .thumbnails .thumb:nth-of-type(4) {
        opacity: 1;
        cursor: default;
      }

      @-webkit-keyframes full {
        from {
          -webkit-transform: translate(-50%, -50%) scale(0.8);
          transform: translate(-50%, -50%) scale(0.8);
        }
        to {
          -webkit-transform: translate(-50%, -50%) scale(1);
          transform: translate(-50%, -50%) scale(1);
        }
      }

      @keyframes full {
        from {
          -webkit-transform: translate(-50%, -50%) scale(0.8);
          transform: translate(-50%, -50%) scale(0.8);
        }
        to {
          -webkit-transform: translate(-50%, -50%) scale(1);
          transform: translate(-50%, -50%) scale(1);
        }
      }
      @-webkit-keyframes shadow {
        from {
          box-shadow: 0 0 0 100vmin rgba(24, 33, 45, 0), 0 0 10vmin rgba(13, 21, 31, 0);
        }
        to {
          box-shadow: 0 0 0 100vmin rgba(24, 33, 45, 0.6), 0 0 10vmin rgba(13, 21, 31, 0.6);
        }
      }
      @keyframes shadow {
        from {
          box-shadow: 0 0 0 100vmin rgba(24, 33, 45, 0), 0 0 10vmin rgba(13, 21, 31, 0);
        }
        to {
          box-shadow: 0 0 0 100vmin rgba(24, 33, 45, 0.6), 0 0 10vmin rgba(13, 21, 31, 0.6);
        }
      }

    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <h1>Gallery</h1>
    <section class="gallery">
    <div class="carousel">
      <div id="radios">
      </div>

      <input type="checkbox" id="fullscreen" name="gallery-fullscreen-control"/>

      <div class="wrap" id="images">

      </div>

      <div class="thumbnails" id="thumbnails">

        <div class="slider"><div class="indicator"></div></div>
      </div>
    </div>
    </section>


    <script type="text/javascript">
      $(document).ready(function(){
        getPhotos();
      });

      function getPhotos(){
        var url = 'images.php';
        $.post( url, function( data ) {
          var images = data.split("\n");
          images.forEach(function(i,ii){
            console.log(ii);
            ii++;
            if(i !== ""){
              i = "photos/"+i;
              if(ii == 1){
                $("radios").append('<input type="radio" id="image'+ii+'" name="gallery-control" checked>');
              }else{
                $("radios").append('<input type="radio" id="image'+ii+'" name="gallery-control">');
              }
              $("#images").append('<figure><label for="fullscreen"><img src="'+i+'" alt="image'+ii+'"/></label></figure>');
              $("#thumbnails").append('<label for="image'+ii+'" class="thumb" style="background-image: url(\''+i+'\')"></label>');
            }
          });
        });
      }
    </script>
  </body>
</html>
