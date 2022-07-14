<?php 
include "includes/session.php"; 
include "includes/config.php"; 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["submit"])){
    include "includes/php-validate.php";
    if(isset($_POST["text"], $_FILES["photo"]) && empty($txt_err) && empty($img_err)){
      //$pid = generateKey("includes/ids.txt", "", "", 13);
      $date = date("d-m-Y");
      $aut = $_SESSION["adminlogin"];
        move_uploaded_file($tmp[0], "../uploaded-images/".$image[0]);
        $sql = $conn->prepare("INSERT INTO images(caption, author, image_link, date) VALUES(?, ?, ?, ?)");
        $sql->bind_param("ssss",$text[0],$aut,$image[0],$date);
        if($sql->execute()){
          $text[0] = "";
          $_SESSION["success"] = "Image uploaded successfully";
          unset($_POST["submit"]);
      }
      else
        $_SESSION["error"] = "Error occured. Check and Try again later";
    }
    else{
      $_SESSION["error"] = "Error occured. Check and Try again later";
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
		<link rel="stylesheet" type="text/css" href="/admin/css/stylesheet/all.css">
		<link rel="stylesheet" type="text/css" href="/admin/css/stylesheet/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/admin/css/stylesheet/style.css">
		<style type="text/css">
      body{
        background: #111;
      }
			.navbar-collapse{
        position: fixed;
        width: 16%;
        z-index: 20;
        align-items: flex-start;
        height: 100%;
        top: 9.5%;
        left: 0;
        background: #333;
      }
      .nav{
        padding: 1px;
        overflow: hidden;
        width: 100%;
        margin-top: 15px;
        box-sizing: border-box;
      }
      .nav .nav-item{
        padding: 7px 10px;
        font-size: 18px;
        margin: 5px;
        background: #202020;
      }
      .nav .nav-item:hover{
        background: #202020;
      }
      .main{
        margin-left: 16%;
        padding: 5px;
        width: 84%;
      }
      .top-bar{
        padding: 5px;
        background: #222;
        widt
      }
      .bg-dark2{
        background: #131313;
      }
      .at-block{
        width: 200px;
        display: block;
        margin: 0 auto;
        height: 200px;
        border-radius: 100%;
        border: 13px solid #555;
        background: #222;
      }
      .table{
        width: 100%;
        overflow: auto;
      }
      @media screen and (max-width: 767px){
        .navbar-collapse{
          z-index: 12;
          width: 200px;
        }
        .main{
          margin-left: 0%;
          width: 100%;
        }
      }
		</style>
	</head>
	<body>
    <div class="container-fluid">
      <?php include "includes/header.php"; ?>

      <div class="main">
        <?php if(!empty($_SESSION["error"])){
          ?>
          <div class="alert alert-danger">
            <?php echo $_SESSION["error"]; $_SESSION["error"] = "";?>
            <button type="button" class="close" data-dismiss="alert">&times</button>
          </div>
          <?php } else if(!empty($_SESSION["success"])){
            ?>
          <div class="alert alert-success">
            <?php echo $_SESSION["success"]; $_SESSION["success"] = "";?>
            <button type="button" class="close" data-dismiss="alert">&times</button>
          </div>
          <?php } else{
              }
          ?>

          <!-- Modal to add image -->
        <div class="modal" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-dark text-white p-3 pl-4">
            <div class="fa-lg">Add new image</div>
            <button type="button" class="close" data-dismiss="modal">&times</button>
          </div>
           <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="d-block form-label">Caption</label>
                <input type="text" name="text[]" value="<?php if(isset($text[0])) echo $text[0]; ?>" class="form-control">
                <span class="help-block"><?php if(isset($text_err[0])) echo $text_err[0]; ?></span>
              </div>
              <div class="form-group">
                <label class="d-block form-label">Upload Image</label>
                <input type="file" name="photo[]">
                <span class="help-block"><?php if(isset($image_err[0])) echo $image_err[0]; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-danger w-25" name="submit" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="ViewImage">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header p-2">
            <h5 class="font-weight-bold img-view-caption"> The name in man</h5>
            <!-- <button type="button" data-dismiss="modal" class="close btn btn-danger">&times</button> -->
          </div>
          <div class="modal-body">
            <img class="img-view-image" src="/assets/images/img_2.jpg" width="100%" height="400">
          </div>
        </div>
      </div>
    </div>

        <div class="p-2 top-bar">
          <h4 class="d-inline font-weight-bold text-warning">Uploads</h4>
          <div class="d-inline ml-auto">
            <button type="button" class="btn btn-warning btn-rounded text-white" data-toggle="modal" data-target="#modal">
              <i class="fa fa-plus fa-lg"></i> Add Image
            </button> 
          </div> 
        </div>
        <div class="dfd mt-3">
          <div class="table">
          <table class="table text-white table-striped">
            <thead>
              <tr>
                <th>Caption</th>
                <th>Image</th>
                <th>Date</th>
                <th>Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //include "includes/config.php";
                $sql = "SELECT caption, image_link, date, author FROM images ORDER BY id DESC";
                if($result = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result)){
                    $cnt=0;
                    while($row = mysqli_fetch_array($result)){
                      $cnt++;
                      ?>
              <tr>
                <td class="dt<?php echo $cnt; ?> text-capitalize"><?php echo $row["caption"]; ?></td>
                <td class="dt<?php echo $cnt; ?> text-capitalize"><?php echo $row["image_link"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["author"]; ?></td>
                <td>
                  <button type="button" id="dt<?php echo $cnt; ?>" onclick="showImage(this.id);" data-toggle="modal" data-target = "#ViewImage" class="btn btn-secondary">
                    <i class="fa fa-eye"></i>View
                  </button>
                  <a href="" class="btn btn-primary">
                    <i class="fa fa-edit"></i>Edit
                  </a>
                  <a href="" class="btn btn-danger">
                    <i class="fa fa-trash"></i>Delete
                  </a>
                </td>
              </tr>
                      <?php
                    }
                  }
                }
              ?>
            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function showImage(elem){
        var elemt = document.querySelectorAll("."+elem);
        document.querySelector(".img-view-caption").innerText = elemt[0].innerText;
        document.querySelector(".img-view-image").src = "/uploaded-images/"+elemt[1].innerText;
      }
    </script>
		<script type="text/javascript" src="/admin/script/js/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="/admin/script/js/popper.min.js"></script>
		<script type="text/javascript" src="/admin/script/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/admin/script/js/custom.js"></script>
		<script type="text/javascript" src="/admin/script/js/color.js"></script>
	</body>
</html>