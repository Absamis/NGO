<!DOCTYPE html>
<html lang="en-Us">
  <head>
    <title>AdeyemiAdebayoFoundation...Home</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Adeyemi Adebayo Foundation is a none Governmental Organisation, established for rendering support to the needy...">

    <link rel="icon" type="image/xicon">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet/all.css">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/stylesheet/style.css">
    <style type="text/css">
      .block-overlay{
        max-width: 450px;
        max-height: 400px;
        overflow: auto;
      }
      .block-overlay h2{
          font-weight: bolder;
      }
      .block-overlay p{
          font-size: 19px;
          color: white;
          line-height: 1.9em;
      }
      .brand-text{
        font-size: 14px;
        display: block;
        text-align: right;
        margin-left: 4.9rem;
        margin-top: -1.2rem;
      }
      .card-title{
        padding: 0px;
        margin: 0px;
        font-weight: 560;
      }
      p.card-text{
        font-size: 17px !important;
        font-weight: 500;
        margin: 0px;
      }
      .card-img-top{
        max-height: 400px;
      }
      .card-img{
        display: block;
        max-height: 500px;
      }
      .font-2{
        font-size: 1.2rem;
        font-weight: 100;
        line-height: 1.9rem;
      }
      .right-place{
        right: 0;
      }
      .card-img img{
        width: 100%;
        max-height: 400px;
      }
      .gallery-frame{
        position: fixed;
        top: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,0.9);
        z-index: 10;
      }
      .gallery{
        position: relative;
        height: 450px;
        white-space: nowrap;
        overflow: hidden;
      }
      .gallery-img{
        position: absolute;
        width: 100%;
        height: 450px;
      }
      .gallery-img.active{
        z-index: 10;
      }
      .pointer-left, .pointer-right{
        width: 20%;
        color: white;
        cursor: pointer;
        background: rgba(0,0,0,0.2);
        top: 0;
        z-index: 13;
        position: absolute;
        height: 100%;
      }
      .move-out-left{
        animation: moveout 1s linear;
      }
      .move-out-right{
        animation: moveoutright 1s linear;
      }
      .move-in-right{
        animation: moveinright 1s linear;
      }
      .move-in-left{
        animation: movein 1s linear;
      }
      .normal{
        transform: translate(0px, 0px);
      }
      .set-position{
        z-index: 10;
        transform: translate(100%, 0px);
      }
      .set-position-right{
        z-index: 10;
        transform: translate(-100%, 0px);
      }
      @keyframes moveoutright{
        from{transform: translate(0px, 0px);}
        to{transform: translate(100%, 0px);}
      }
      @keyframes moveinright{
        from{transform: translate(-100%, 0px);}
        to{transform: translate(0px, 0px);}
      }
      @keyframes moveout{
        from{transform: translate(0px, 0px);}
        to{transform: translate(-100%, 0px);}
      }
      @keyframes movein{
        from{transform: translate(100%, 0px);}
        to{transform: translate(0%, 0px);}
      }
      .pointer-right{
        right: 0;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <?php include "../includes/header.php"; ?>
      <!-- <div class="container-fluid"> -->
      <div class="content-middle gallery-frame">
        <div class="gallery col-sm-7 pl-0 pr-0">
          <div class="content-middle pointer-left">
            <i class="fa-4x p-left fa fa-angle-left"></i>
          </div>
          <div class="content-middle pointer-right">
            <i class="fa-4x p-right fa fa-angle-right"></i>
          </div>
          <?php
          include "../admin/includes/config.php";
          $sql = "SELECT image_link FROM images";
          if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                ?>
          <img src="../uploaded-images/<?php echo $row["image_link"]; ?>" alt="gallery" class="gallery-img active">
          <?php
              }
            }
          }
          ?>
        </div>
      </div>
      <!-- </div> -->
      <div class="container-fluid">
        <div class="label p-3 pl-5">
          <h5 class="heading p-0">Gallery</h5>
          <hr>
        </div>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script type="text/javascript">
      var gimg = document.querySelectorAll(".gallery-img");
      var cnt = 0;
      document.querySelector(".gallery-frame").onclick = function(e){
        //document.querySelector(".gallery-frame").style.display="none";
        e.stopPropagation();
      }
      document.querySelector(".pointer-left").onclick = function(){
        gimg[cnt].classList.add("move-out-left");
        if(cnt == gimg.length - 1){
          j = gimg.length - 1;
          cnt = -1;
        }else 
          j = cnt;
        cnt++;
        gimg[cnt].classList.add("set-position");
        gimg[cnt].classList.add("move-in-left");
        setTimeout(function(){
          gimg[j].classList.remove("active");
          gimg[j].classList.remove("move-out-left");
          gimg[cnt].classList.remove("move-in-left");
          gimg[cnt].classList.remove("set-position");
          gimg[cnt].classList.add("active");
        }, 999.66);
      }

      document.querySelector(".pointer-right").onclick = function(){
        document.querySelector(".pointer-right").disabled=true;
        gimg[cnt].classList.add("move-out-right");
        if(cnt == 0){
          j = 0;
          cnt = gimg.length;
        }else 
          j = cnt;
        cnt--;
        gimg[cnt].classList.add("set-position-right");
        gimg[cnt].classList.add("move-in-right");
        setTimeout(function(){
          gimg[j].classList.remove("active");
          gimg[j].classList.remove("move-out-right");
          gimg[cnt].classList.remove("move-in-right");
          gimg[cnt].classList.remove("set-position-right");
          gimg[cnt].classList.add("active");
        }, 999.66);
      }
    </script>
    <script type="text/javascript" src="/script/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/script/js/popper.min.js"></script>
    <script type="text/javascript" src="/script/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/script/js/custom.js"></script>
    <script type="text/javascript" src="/script/js/color.js"></script>
  </body>
</html>