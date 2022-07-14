<?php 
include "includes/session.php";
include "includes/config.php";  
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["submit"])){
    include "includes/php-validate.php";
    if(isset($_POST["text"], $_FILES["photo"], $_FILES["video"]) && empty($txt_err) && empty($img_err)){
      $pid = generateKey("includes/ids.txt", "", "", 13);
      $date = date("d-m-Y");
      $time = date("H:i A");
      $aut = $_SESSION["adminlogin"];
      if($pid != false){
        if(empty($video[0]))
          $video[0] = "none";
        else{
          move_uploaded_file($vtmp[0], "../uploaded-videos/".$video[0]);
        }
        move_uploaded_file($tmp[0], "../uploaded-images/".$image[0]);
        $sql = $conn->prepare("INSERT INTO posts(title, content, author,date, postid, image_link, video_link, time) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param("ssssssss",$text[0],$text[1],$aut,$date,$pid,$image[0],$video[0], $time);
        if($sql->execute()){
          $text[0] = $text[1] = $video_err[0] = "";
          $_SESSION["success"] = "Post uploaded successfully";
          unset($_POST["submit"]);
        }
        else{
          $_SESSION["error"] = "Error occured. Check and Try again later";
        }
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
        white-space: nowrap;
        overflow: auto;
      }
      .form-label{
        font-size: 18px;
        font-weight: 500;
      }
      .help-block{
        display: block;
        color: red;
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
    <div class="modal" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-dark text-white p-3 pl-4">
            <div class="fa-lg">Add new post</div>
            <button type="button" class="close" data-dismiss="modal">&times</button>
          </div>
           <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="d-block form-label">Title</label>
                <input type="text" name="text[]" value="<?php if(isset($text[0])) echo $text[0]; ?>" class="form-control">
                <span class="help-block"><?php if(isset($text_err[0])) echo $text_err[0]; ?></span>
              </div>
              <div class="row">
                <div class="col-sm-6 pl-0 form-group">
                  <label class="d-block form-label">Add Image</label>
                  <input type="file" name="photo[]" class="form-control">
                  <span class="help-block"><?php if(isset($image_err[0])) echo $image_err[0]; ?></span>
                </div>
                <div class="col-sm-6 pl-0 form-group">
                  <label class="d-block form-label">Add video <small>(<i>Optional</i>)</small></label>
                  <input type="file" name="video[]" class="form-control">
                  <span class="help-block"><?php if(isset($video_err[0])) echo $video_err[0]; ?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="d-block form-label">Content</label>
                <textarea class="form-control" rows="15"name="text[]"><?php if(isset($text[1])) echo $text[1]; ?></textarea>
                <span class="help-block"><?php if(isset($text_err[1])) echo $text_err[1]; ?></span>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-danger w-25" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
        <div class="p-2 top-bar">
          <h4 class="d-inline font-weight-bold text-warning">Posts</h4>
          <div class="d-inline ml-auto">
            <button type="button" class="btn btn-warning btn-rounded text-white" data-toggle="modal" data-target="#modal">
              <i class="fa fa-plus fa-lg"></i> Add Post
            </button> 
          </div> 
        </div>
        <div class="dfd mt-3">
          <div class="table">
          <table class="table text-white table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //include "includes/config.php";
                $sql = "SELECT title, date, author FROM posts ORDER BY id DESC";
                if($result = mysqli_query($conn, $sql)){
                  if(mysqli_num_rows($result)){
                    while($row = mysqli_fetch_array($result)){
                      ?>
              <tr>
                <td class="text-capitalize"><?php echo $row["title"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["author"]; ?></td>
                <td>
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
		<script type="text/javascript" src="/admin/script/js/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="/admin/script/js/popper.min.js"></script>
		<script type="text/javascript" src="/admin/script/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/admin/script/js/custom.js"></script>
		<script type="text/javascript" src="/admin/script/js/color.js"></script>
	</body>
</html>