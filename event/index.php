<?php include "../admin/includes/config.php"; ?>
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
            .right-0{
              right: 0;
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
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <?php include "../includes/header.php"; ?>
      <div class="label p-3 pl-5">
        <h5 class="heading p-0">All Posts</h5>
      </div>
      <div class="row">
        <?php
          $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 9";
          if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                ?>
          <div class="col-sm-6 col-md-6 col-lg-4 mt-3">
            <div class="card content">
              <img src="/uploaded-images/<?php echo $row["image_link"]; ?>" class="card-img-top" alt="event images">
              <div class="card-body pb-1">
                <h5 class="content-head" ><a href="/event/view.php?post=<?php echo $row["title"]; ?>" class="text-dark"><?php echo $row["title"]; ?></a></h5>
                <p class="descr mb-1"><?php echo $row["content"]; ?></p>
                <span class="text-white p-1 bg-danger"><i>By:</i> <b><?php echo $row["author"]; ?></b></span>
              </div>
            </div>
          </div>
                <?php
              }
            }
          }
          ?>
      </div>
      <div class="pages p-4 content-middle">
        <ul class="pagination pagination-lg">
          <li class="active bg-whine"><a href="" class="text-white"><i class="fa fa-angle-left fa-lg"></i></a></li>
          <li class="active"><a href="">1</a></li>
          <li><a href="">2</a></li>
          <li><a href="">3</a></li>
          <li><a href="">4</a></li>
          <li class="active bg-whine"><a href="" class="text-white"><i class="fa fa-angle-right fa-lg"></i></a></li>
        </ul>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script type="text/javascript" src="/script/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/script/js/custom.js"></script>
    <script type="text/javascript" src="/script/js/popper.min.js"></script>
    <script type="text/javascript" src="/script/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/script/js/color.js"></script>
  </body>
</html>