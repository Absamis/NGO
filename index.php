<?php include "admin/includes/config.php"; ?>
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
      .block-overlay.lay{
                max-width: 450px;
                max-height: 400px;
                overflow: auto;
            }
            .bg-img{
              background: url("assets/images/bimg.jpg");
            }
            .bg-img2{
              background: url("assets/images/backimg.jpg");
            }
            .block{
              padding: 30px 10px;
            }
            .block.bg-img3{
              background: url("assets/images/stop-taking-givers-for-granted-702x336.jpg") no-repeat;
              background-size: cover;
              width: 100%;
              /*height: 450px;*/
              max-height: 700px;
            }
            /*.bg-img3{
              background: url("stop-taking-givers-for-granted-702x336.jpg");
            }*/
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
            .img{
              max-height: 500px;
            }
            .btn-bordered{
              padding: 7px 10px;
              border: 2px solid red;
              color: black;
              outline: none;
              font-size-adjust: 18px;
              margin-left: 5px;
              margin-bottom:  .6rem;
              background: transparent;
              margin-top: 0px;
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
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <?php include "includes/header.php"; ?>
      <div class="banner">
        <div class="bg-dark">
          <img src="/assets/images/img_3.jpg" class="img-fade banner-img-lrg" alt="banner image">
          <div class="block-overlay lay o-right">
            <h2 class="text-white text-center p-3">Save the Children</h2>
            <p class="text-left content-wrap">Children are the Leaders who are expected to grow strong as our next generation. Putting Them in suffering is against humanly feelings</p>
            <a href="event/" class="btn-rounded text-white bg-warning">Check our Support</a>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="label">
          <div class="fa-lg font-weight-bold text-center">WHAT DO WE DO</div>
        </div>  
        <div class="row">
          <div class="col-md-4 mt-3">
            <div class="card bg-whine shadow-box">
              <div class="card-body">
                <div class="icon-box-md mx-auto bg-whine">
                  <i class="fas fa-handshake text-white"></i>
                </div>
                <h4 class="heading text-center text-white">We Support</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-3">
            <div class="card bg-light shadow-box">
              <div class="card-body">
                <div class="icon-box-md mx-auto bg-whine">
                  <i class="fas fa-rocket text-white"></i>
                </div>
                <h4 class="heading text-center">We Promote</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4 mt-3">
            <div class="card bg-whine shadow-box">
              <div class="card-body">
                <div class="icon-box-md mx-auto bg-whine">
                  <i class="fas fa-glass-cheers text-white"></i>
                </div>
                <h4 class="heading text-center text-white">We Celebrate</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="abt-block mt-5 bg-img2">
        <div class="row">
          <div class="col-md-7 pl-0">
            <div class="img-block">
              <img src="assets/images/foun-img.jpg" class="img-responsive" alt="foundation image" >
            </div>
          </div>
          <div class="col-md-5 p-3">
            <h3 class="heading text-center pt-5">WANT TO KNOW ABOUT US?</h3>
            <p class="headtext">AdeyemiAdebayoFoundation is a non governmental organisation That supports, provide provisions and celebrates the needy in the communit.</p>
            <p class="headtext">We are detrmined to getting the economy a better pase for all individuals. Avoid criticsm and illegal conduct on the less privillegded.</p>
            <a href="/about-us/" class="btn btn-danger w-75 d-block mx-auto">Learn more about us</a>
          </div>
        </div>
      </div>
      <section>
        <div class="label">
          <div class="lbl">Our Events</div>
        </div>
        <div class="row">
          <?php
          $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
          if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
                ?>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card content">
              <img src="/uploaded-images/<?php echo $row["image_link"]; ?>" class="card-img-top" alt="event images">
              <div class="card-body pb-0">
                <h5 class="content-head" ><?php echo $row["title"]; ?></h5>
                <p class="descr"><?php echo $row["content"]; ?></p>
              </div>
              <a href="/event/view.php?post=<?php echo $row["title"]; ?>" class="text-center text-dark btn-bordered w-50">
                Read More
              </a>
            </div>
          </div>
                <?php
              }
            }
          }
          ?>
        </div>
        <div class="mt-5 p-relative p-0">
          <div class="block bg-img3 p-1">
            <h1 class="p-3 mt-4 font-weight-bold text-white text-center">Donations to the Foundation makes the work easier</h1>
            <p class="text-white text-center fa-lg"  style="line-height: 30px;">Adding to the values of the foundation promotes the financial capabilities in the work of charity.</p>
            <a href="/contact-us" class="btn btn-rounded d-block mx-auto bg-whine w-50">Donate now</a>
          </div>
        </div>
        <hr>
        <div class="container-fluid p-3 bg-img">
          <div class="container justify-content-md-center p-0 ">
            <div class="label">
              <div class="heading bordered-label text-center">OUR TEAM MEMBERS</div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4 mt-3">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="assets/images/img_4.jpg" class="rounded-circle mx-auto" width="150" height="150">
                    <h5 class="card-title">Mr Adeyemi Adebayo</h5>
                    <p class="card-text">Founder of Adeyemi Adebayo's Foundation</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 mt-3">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="assets/images/img_4.jpg" class="rounded-circle mx-auto" width="150" height="150">
                    <h5 class="card-title">Mrs Adeyemi Funmilayo</h5>
                    <p class="card-text">Co-founder of Adeyemi Adebayo's Foundation</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 mt-3">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="assets/images/img_4.jpg" class="rounded-circle mx-auto" width="150" height="150">
                    <h5 class="card-title">Mr Kareem Folawiyo</h5>
                    <p class="card-text">General Secretary of Adeyemi Adebayo's Foundation</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="label">
            <div class="lbl">Our Gallery</div>
          </div>
        </div>
        <div class="container">
          <div class="label">
            <div class="fa-lg text-center">We are registered under:</div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-5">
              <div class="card shadow-box p-2">
                <div class="content-middle">
                  <img src="assets/images/cac.jpg" class="" alt="event images">
                  <!-- <div class="fa-lg ml-2" style="line-height: 25px;">Commission of Affairs Committe</div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include "includes/footer.php"; ?>
    </div>
    <!-- 
     -->
    <script type="text/javascript" src="/script/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="/script/js/popper.min.js"></script>
    <script type="text/javascript" src="/script/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/script/js/custom.js"></script>
    <script type="text/javascript" src="/script/js/color.js"></script>
  </body>
</html>