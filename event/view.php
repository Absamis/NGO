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
            .card-title{
              padding: 0px;
              margin: 0px;
              font-weight: 560;
            }
            .brand-text{
              font-size: 14px;
              display: block;
              text-align: right;
              margin-left: 4.9rem;
              margin-top: -1.2rem;
            }
            p.card-text{
              font-size: 17px !important;
              font-weight: 500;
              margin: 0px;
            }
            .font-2{
              font-size: 1.2rem;
              line-height: 1.9rem;
              color: red;
            }
            .media{
              border: 1px solid #ccc;
              border-radius: 4px;
              background: #eee;
              margin-top: 7px;
            }
            .right-place{
              right: 0;
            }
            .card-img img{
              width: 100%;
              max-height: 400px;
            }
            .desc{
              display: inline-block;
              font-style: italic;
              margin-left: 5px;
              color: tomato;
            }
            .fsm{
              font-size: 16px;
            }
            .cnt:first-letter{
              text-transform: uppercase;
            }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <?php include "../includes/header.php"; ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-7">
            <div class="card pb-2">
                <?php
                if($_SERVER["REQUEST_METHOD"] == "GET"){
                  if(isset($_GET["post"]) && !empty($_GET["post"])){
                    include "../admin/includes/config.php";
                    $post = $_GET["post"];
                    $sql = "SELECT * FROM posts WHERE title = ?";
                    $smt = $conn->prepare($sql);
                    $smt->bind_param("s", $post);
                    $smt->execute();
                    $result = $smt->get_result();
                    $row = $result->fetch_assoc();
                    $id = $row["id"];
                    $pid = $row["postid"];
                      ?>
              <div class="card-body">
                <h4 class="p-1 heading text-center text-dark text-capitalize"><?php echo $row["title"]; ?></h4>
                <div class="p-relative" style="height: 50px;">
                  <div class="p-2 bg-transparent content-info">
                    <span class="fa-lg text-dark fsm"><i class="fa fa-calendar"></i> <?php echo $row["date"]; ?></span>
                  </div>
                  <div class="p-2 right-place bg-transparent content-info">
                    <span class="fa-lg text-dark fsm"><i class="fa fa-clock"></i> <?php echo $row["time"]; ?></span>
                  </div>
                </div>
                <div class="mt-5 p-relative">
                  <div class="p-2 bg-transparent content-info">
                    <span class="fa-lg text-dark fsm"><i class="fa fa-pen"></i> <?php echo $row["author"]; ?></span>
                  </div>
                  <div class="p-2 right-place bg-transparent content-info">
                    <span class="fa-lg text-dark fsm"><i class="mr-1 fa fa-comments"></i>10</span>
                    <span class="fa-lg text-dark fsm"><i class="mr-1 fa fa-eye"></i>10</span>
                  </div>
                </div>
                <div class="card-img">
                  <img src="/uploaded-images/<?php echo $row["image_link"]; ?>" class="thumbnail img-fluid" alt="event image">
                </div>
              </div>
              <div class="card-body">
                <p class="text-dark cnt font-2"><?php echo $row["content"]; ?></p>    
              </div>
              <?php if($row["video_link"] != "none"){
                ?>
              <div class="container">
                <video src="/uploaded-videos/<?php echo $row["video_link"]; ?>" controls width="100%"height="300"></video>
              </div>
                  <?php
                }?>
                  <?php
                    }
                  }
                  ?>
              <div class="p-3 col-12 ml-3">
                <p class="font-weight-bold">
                  Share this post 
                  <i class="fa fa-share-alt fa-lg"></i>
                </p>
                <a href="" class="">
                  <span class="text-primary fab fa-facebook fa-2x mr-2"></span>
                </a>
                <a href="" class="">
                  <span class="text-danger fab fa-instagram fa-2x mr-2"></span>
                </a>
                <a href="" class="">
                  <span class="text-success fab fa-whatsapp fa-2x mr-2"></span>
                </a>
              </div>
              <div class="container mt-3">
                <div class="">
                  <h5 class="heading">Leave a comment</h5>
                </div>
                <form action="../includes/php-action.php" method="post">
                  <div class="form-group">
                    <input type="text" name="name[]" class="form-control" placeholder="Name*">
                    <span class="d-block text-danger"><?php if(isset($name_err[0])) echo $name_err[0]; ?></span>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="text[]" rows="4" placeholder="Comment*"></textarea>
                    <span class="d-block text-danger"><?php if(isset($text_err[0])) echo $text_err[0]; ?></span>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="submit" value="Send" class="btn btn-danger w-50 font-weight-bold w-50 mt-2">
                  </div>
                  <input type="hidden" value="<?php echo $pid; ?>" name="id">
                </form>
                <div class="pl-3 fa-lg label border-bottom">
                  Comments
                </div>
                <div class="comment-block">
                  <?php
                    if($_SERVER["REQUEST_METHOD"] == "GET"){
                      if(isset($_GET["post"]) && !empty($_GET["post"])){
                        //include "../admin/includes/config.php";
                        $post = $_GET["post"];
                        $sql = "SELECT * FROM comments WHERE cmtpost = ?";
                        $smt = $conn->prepare($sql);
                        $smt->bind_param("s", $pid);
                        $smt->execute();
                        $result = $smt->get_result();
                        while ($row = $result->fetch_assoc()){
                    ?>
                  <div class="media p-1">
                    <div class="mt-2">
                      <i class="fa-3x fa fa-user-circle"></i>
                    </div>
                    <div class="media-body">
                      <h5 class="text-capitalize mt-3 ml-3">
                        <?php echo $row["name"]; ?>
                        <small class="desc">Posted on: <?php echo $row["date"]; ?></small>
                      </h5>
                      <p class="ml-3 cnt"><?php echo $row["comment"]; ?></p>
                    </div>
                  </div>

                  <?php
                      }
                    }
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="label pl-0">
              <div class="lbl w-100">Related Events</div>
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "GET"){
              if(isset($_GET["post"]) && !empty($_GET["post"])){
                  $sql = "SELECT * FROM posts WHERE id > $id OR id < $id ORDER BY id ASC LIMIT 5";
                  if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_array($result)){
                        ?>
            <div class="row bordered content">
              <div class="col-4 col-sm-3 p-2">
                <img src="/uploaded-images/<?php echo $row["image_link"]; ?>" alt="event img" class="evt-img">
              </div>
              <div class="col-8 col-sm-9 p-2 p-relative">
                <h6 class="" ><a href="/event/view.php?post=<?php echo $row["title"]; ?>" class="text-dark min"><?php echo $row["title"]; ?></a></h6>
                <div class="content-info">
                  <span class="content-date"><i>By:</i> <?php echo $row["author"]; ?></span>
                </div>
              </div>
            </div>
                        <?php
                      }
                    }
                  }
                  mysqli_close($conn);
                }
              }
            ?>

            <!-- <div class="row bordered content">
              <div class="col-4 col-sm-3 p-2">
                <img src="../assets/images/img_2.jpg" alt="event img" class="evt-img">
              </div>
              <div class="col-8 col-sm-9 p-2 p-relative">
                <h6 class="min">Helpless Child Sent To School By Our Members in the person of the height</h6>
                <div class="content-info">
                  <span class="content-date"><i class="fa-lg fa fa-calendar"></i>34-04-2021</span>
                </div>
              </div>
            </div>

            <div class="row bordered content">
              <div class="col-4 col-sm-3 p-2">
                <img src="../assets/images/img_2.jpg" alt="event img" class="evt-img">
              </div>
              <div class="col-8 col-sm-9 p-2 p-relative">
                <h6 class="min">Helpless Child Sent To School By Our Members in the person of the height</h6>
                <div class="content-info">
                  <span class="content-date"><i class="fa-lg fa fa-calendar"></i>34-04-2021</span>
                </div>
              </div>
            </div> -->
            <div class="row p-4 shadow mt-3">
              <div class="card bg-transparent w-100">
                <h5 class="card-title pb-3">Send us a message</h5>
                <form action="" method="">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name*">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Phone-number*">
                  </div>
                  <textarea class="form-control" rows="4" placeholder="Message*"></textarea>
                  <div class="form-group">
                    <input type="submit" value="Send" class="btn-rounded bg-whine font-weight-bold w-50 mt-2">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script type="text/javascript" src="/script/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/script/js/popper.min.js"></script>
    <script type="text/javascript" src="/script/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/script/js/custom.js"></script>
    <script type="text/javascript" src="/script/js/color.js"></script>
  </body>
</html>