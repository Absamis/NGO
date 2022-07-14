<?php include "includes/session.php"; ?>
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
        <div class="p-2 top-bar">
          <h4 class="d-inline font-weight-bold text-warning">Messages</h4> 
        </div>
        <div class="dfd mt-3">
          <div class="table">
          <table class="table text-white table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              include "includes/config.php";
              $sql = "SELECT * FROM messages";
              if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                      <td class="text-capitalize"><?php echo $row["name"]; ?></td>
                      <td><?php echo $row["email"]; ?></td>
                      <td><?php echo $row["phone"]; ?></td>
                      <td>
                        <a href="" class="btn btn-primary">
                          <i class="fa fa-edit"></i>Edit
                        </a>
                        <a href="" class="btn btn-danger">
                          <i class="fa fa-trash"></i>Delete
                        </a>
                      </td>
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