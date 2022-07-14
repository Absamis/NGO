<?php include "includes/session.php"; 

include "includes/config.php"; 
$sql = "SELECT * FROM posts";
$pst = mysqli_num_rows(mysqli_query($conn, $sql));
$sql = "SELECT * FROM images";
$img = mysqli_num_rows(mysqli_query($conn, $sql));
// $sql = "SELECT * FROM posts";
// $pst = mysqli_num_rows(mysqli_query($conn, $sql));
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
      .table{
        width: 100%;
        white-space: nowrap;
        overflow: auto;
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
        <div class="p-2 top-bar">
          <h4 class="font-weight-bold text-warning">Dashboard</h4>  
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="card shadow bg-dark2 mt-3">
              <div class="card-body">
                <div class="text-white flex-column d-flex align-items-center justify-content-center at-block">
                  <h2 class="fa-3x font-weight-bold"><?php echo $pst; ?></h2>
                  <h6 class="fa-lg">Posts</h6>
                </div>  
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="card shadow bg-dark2 mt-3">
              <div class="card-body">
                <div class="text-white flex-column d-flex align-items-center justify-content-center at-block">
                  <h2 class="fa-3x font-weight-bold"><?php echo $img; ?></h2>
                  <h6 class="fa-lg">Images</h6>
                </div>  
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="card shadow bg-dark2 mt-3">
              <div class="card-body">
                <div class="text-white flex-column d-flex align-items-center justify-content-center at-block">
                  <h2 class="fa-3x font-weight-bold">15</h2>
                  <h6 class="fa-lg">Messages</h6>
                </div>  
              </div>
            </div>
          </div>
      </div>
      <div class="label mt-3 p-2 pl-0">
        <h4 class="font-weight-bold text-warning">Quick Stats</h4>
      </div>
      <div class="table">
      <table class="table text-white table-striped">
        <thead>
          <tr>
            <th>Post Title</th>
            <th>Author</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Foundation giving tips to grow</td>
            <td>Oreoluwa</td>
            <td>
              Highest Comment
              <div class="badge badge-pills badge-primary">20 comments</div>
            </td>
          </tr> 
        </tbody>
      </table>
      </div>
    </div>
		<script type="text/javascript" src="/admin/script/js/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="/admin/script/js/popper.min.js"></script>
		<script type="text/javascript" src="/admin/script/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/admin/script/js/custom.js"></script>
		<script type="text/javascript" src="/admin/script/js/color.js"></script>
	</body>
</html>