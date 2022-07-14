<?php 
session_start();
include "includes/config.php";
if(isset($_POST["user"]) && isset($_POST["pass"]) && !empty($_POST["user"]) && !empty($_POST["pass"])){
  $user = $_POST["user"];
  $pass = sha1($_POST["pass"]);
  $stmt = $conn->prepare("SELECT id,username, password FROM logins WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $user, $pass);
  $stmt->execute();
  $result=$stmt->get_result();
  $row= $result->fetch_assoc();
  if($row["username"] == $user && $row["password"] == $pass){
    $_SESSION["adminlogin"] = $user;
    $_SESSION["adminid"] = $row["id"];
    $_SESSION["error"] = "";
    header("location: dashboard.php");
  }
  else{
    // echo '<script>ocalStorage.setItem(</script>';
    $_SESSION["error"] = "Invalid login details";
    //$_SESSION["cnt"] += $_SESSION["cnt"] + 1;
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
      .alert{
        display: nne;
      }
		</style>
	</head>
	<body>
    <div class="content-middle container-fluid" style="height: 100%;position: absolute">
      <div class="col-md-5">
        <div class="card">
          <div class="alert alert-danger mb-0" style="<?php if(!empty($_SESSION["error"])) echo "display: block;"; else echo"display: none;"; ?>">
            <?php if(!empty($_SESSION["error"])) echo sha1("foundation"); ?>
            <button type="button" class="close" data-dismiss="alert">&times</button>
          </div>
          <div class="card-header bg-dark">
            <h5 class="text-white font-weight-bold">Admin login</h5> 
          </div>
          <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
              <div class="form-group">
                <label class="d-block form-label">Username</label>
                <input type="text" class="form-control" autocomplete="off" placeholder="admin1234" name="user">
              </div>
              <div class="form-group">
                <label class="d-block form-label">Password</label>
                <input type="password" class="form-control" autocomplete="off" placeholder="admin1234" name="pass">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-success w-25" value="Login">
              </div>
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