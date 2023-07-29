<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
  <?php
  if(isset($_POST["Login"])){
    $unique_ID = $_POST["Unique_ID"];
    $password = $_POST["password"];
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE unique_ID = '$unique_ID'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($user){
      if(password_verify($password, $user["password"])){
        header("Location: voting.php");
        die();
      }else{
        echo "<div style='color: red; font-size: 15px;'>Id or Password is wrong</div>";
      }
    }else{
      echo "<div style='color: red; font-size: 15px;'>Id or Password is wrong</div>";
    }
  }
  ?>
    <div class="title">Login</div>
    <div class="content">
        <form class="user-details" action="" method="post">
          <div class="input-box">
            <span class="details">Your ID</span>
            <input type="number" name="Unique_ID" placeholder="Enter your ID">
            <p style="color: red;">Please enter your generated ID</p>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password">
          </div>
          <div class="button">
            <input type="submit" value="Login" name="Login">
          </div>
        </form>
    </div>
  </div>
</body>
</html>