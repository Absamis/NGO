<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["submit"])){
    include "../admin/includes/php-validate.php";
    if(isset($_POST["name"], $_POST["text"]) && empty($n_err) && empty($txt_err)){
      include "../admin/includes/config.php";
      $date = date("d-m-Y");
      $cid = htmlspecialchars($_POST["id"]);
      $sql = $conn->prepare("INSERT INTO comments(name, comment, date, cmtpost) VALUES(?, ?, ?, ?)");
      $sql->bind_param("ssss", $name[0], $text[0], $date, $cid);
      $sql->execute();
      echo '<script>alert("Comment Added successfully");history.back();</script>';
    }
    else{
      
      echo '<script>alert("Error occured. Try again later"); history.back();</script>';
    }
  }
}
?>