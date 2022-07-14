<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["submit"])){
    include "../admin/includes/php-validate.php";
    if(isset($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["text"]) && empty($n_err) && empty($em_err) && empty($ph_err) && empty($txt_err)){
      include "../admin/includes/config.php";
      $date = date("d-m-Y");
      $sql = $conn->prepare("INSERT INTO messages(name, email, phone, messsage, date) VALUES(?, ?, ?, ?, ?)");
      $sql->bind_param("sssss", $name[0], $email[0], $phone[0], $text[0], $date);
      $sql->execute();
      echo '<script>alert("Message sent successfully"); location.href="/contact-us/";</script>';
    }
  }
}
?>
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
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <?php include "../includes/header.php"; ?>
      <div class="container-fluid">
        <div class="label p-3 m-0 pl-5">
          <h5 class="heading p-0">Contact Us</h5>
          <hr>
        </div>
        <div class="container">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Send a quick message</h5>
              <p class="fa-lg card-text" style="line-height: 25px;">For more informations from us, kindly fill the form below to send us a message</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="pl-0 form-group">
                  <input type="text" class="form-control" placeholder="Fullname" name="name[]" value="<?php if(isset($name[0])) echo $name[0]; ?>">
                  <span class="d-block text-danger"><?php if(isset($name_err[0])) echo $name_err[0]; ?></span>
                </div>
                <div class="row">          
                  <div class="pl-0 form-group col-sm-6">
                    <input type="text" class="form-control" placeholder="Email Address" name="email[]" value="<?php if(isset($email[0])) echo $email[0]; ?>">
                  <span class="d-block text-danger"><?php if(isset($email_err[0])) echo $email_err[0]; ?></span>
                  </div>
                  <div class="pl-0 form-group col-sm-6">
                    <input type="text" class="form-control" placeholder="Phone number" name="phone[]" value="<?php if(isset($phone[0])) echo $phone[0]; ?>">
                  <span class="d-block text-danger"><?php if(isset($phone_err[0])) echo $phone_err[0]; ?></span>
                  </div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="text[]" rows="5" placeholder="Message"><?php if(isset($text[0])) echo $text[0]; ?></textarea>
                  <span class="d-block text-danger"><?php if(isset($text_err[0])) echo $text_err[0]; ?></span>
                </div>
                <div class="form-group">
                  <input type="submit" value="Send" name="submit" class="text-white btn-rounded bg-danger w-25">
                </div>
              </form>
            </div>
          </div>
          <h5 class="mt-2 mb-2 card-title">You can also reach us via:</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="p-2 mt-2 bg-secondary">
                <a href="mailto: adeyemiadebayofoundation@gmail.com" class="text-dark">
                  <i class="text-danger fa-2x fa fa-envelope pr-2"></i>
                  <span class="text-light">adeyemiadebayofoundation@gmail.com</span>
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-2 mt-2 bg-secondary">
                <a href="https://www.facebook.com/adeyemiadebayofoundation" class="text-dark">
                  <i class="text-primary fa-2x fab fa-facebook pr-2"></i>
                  <span class="text-light">adeyemiadebayofoundation</span>
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-2 mt-2 bg-secondary">
                <a href="https://www.instagram.com/adeyemiadebayofoundation" class="text-dark">
                  <i class="text-danger fa-2x fab fa-instagram pr-2"></i><span class="text-light">@adeyemiadebayofoundation</span>
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-2 mt-2 bg-secondary">
                <a href="" class="text-dark">
                  <i class="text-success fa-2x fab fa-whatsapp pr-2"></i>
                  <span class="text-light">09098787676, 07089576865</span>
                </a>
              </div>
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