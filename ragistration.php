<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="ragister.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <?php
    if(isset($_POST["submit"])){
      $fullname = $_POST["fullname"];
      $unique_ID = $_POST["Unique"];
      $email = $_POST["email"];
      $phone_number = $_POST["phone"];
      $gender = $_POST["gender"];
      $password = $_POST["password"];

      $passwordHash = password_hash($password, PASSWORD_DEFAULT);

      $errors = array();
      if(empty($fullname) OR empty($unique_ID) OR empty($email) OR empty($phone_number) OR empty($gender) OR empty($password)){
        array_push($errors,"all fields are required");
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors,"email is not valid");
      }
      if((strlen($unique_ID)<4) OR (strlen($unique_ID)>4)){
        array_push($errors,"unigue ID will be size of 4");
      }
      if(strlen($password)<8){
        array_push($errors,"password should not be less than 8 char");
        // $message = "password should not be less than 8 char";
        // echo "<script>alert('$message');</script>";
      }
      require_once "database.php";
      $sql = "SELECT * FROM users WHERE email = '$email' OR unique_ID = '$unique_ID'";
      $result = mysqli_query($conn, $sql);
      $rowCount = mysqli_num_rows($result);
      if($rowCount>0){
        array_push($errors,"Email or unique Id already exists");
      }
      if(count($errors)>0){
        foreach($errors as $error){
          echo "<div style='color: red; font-size: 15px; font-weight: 500;'>$error</div>";
        }
      }else{
        
        $sql = "INSERT INTO users (fullName, unique_ID, email, phoneNumber, gender, password) VALUES ( ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if($prepareStmt){
          mysqli_stmt_bind_param($stmt, 'ssssss', $fullname, $unique_ID, $email, $phone_number, $gender, $passwordHash);
          mysqli_stmt_execute($stmt);
          echo "<div style='color: red; font-size: 15px;>you are ragistered successfully</div>";
          header("Location: email_verification.php");
          die();
        }else{
          die("something went wrong");
        }
      }
    }
    ?>
    <div class="title">Registration Form</div>
    <div class="content">
        <form class="user-details" action="ragistration.php" method="post">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullname" placeholder="Enter your name">
          </div>
          <div class="input-box">
            <span class="details">Unique ID</span>
            <input type="number" name="Unique" placeholder="Please generate your unique ID" id="Unique">
            <p style="font-size: 10px; color: green; font-weight: 400;">unique-ID should be 4 size as-'8934'</p>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your Email">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" name="phone" placeholder="Enter your number">
          </div>
          <div class="input-box">
            <span class="details">Gender</span>   
            <input type="text" name="gender" placeholder="Enter your Gender">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="create a Password">
            <p style="font-size: 10px; color: red; font-weight: 400;">don't forget your password</p>
          </div>
          <div class="button">
            <input type="submit" value="Next" name="submit">
          </div>
        </form>
    </div>
  </div>
</body>
</html>
