<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $sanitized_pass = filter_var($pass, FILTER_SANITIZE_STRING);

   // Check for admin credentials
   if($email == 'admin@admin.com' && $pass == 'admin'){
      header('location:admin/admin_login.php');
      exit;
   }

   // Encrypt the password before checking in the database
   $hashed_pass = sha1($sanitized_pass);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $hashed_pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'Incorrect Username or Password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

   <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">


</head>
<body class="loginPage">
   
<?php include 'components/user_header.php'; ?>

<!-- <section class="form-container">

   <form action="" method="post">
      <h3>Login Now</h3>
      <input type="email" name="email" required placeholder="Email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="Password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" class="btn" name="submit">
      <p>Don't have an account?</p>
      <a href="user_register.php" class="option-btn">Register Now</a>
   </form>

</section> -->

<section class="login-container">

   <h2 class="login-title">Login</h2>
   <form action="" id="loginForm" method="post">

      <div class="form-group">
         <input type="email" name="email" required placeholder="Email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <div class="form-group">
         <input type="password" name="pass" required placeholder="Password" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      </div>

      <input type="submit" value="LOGIN" class="loginBTN" name="submit">

      <!-- <button type="submit">LOGIN</button> -->

      <!-- <div class="login-separator">OR</div> -->
      <!-- <p class="loginText">Don't have an account registered yet?</p> -->
      <div class="link">
         Haven't made an account yet? Register <a href="user_register.php">here</a>
      </div>
         <!-- <a href="user_register.php" class="option-btn">REGISTER NOW</a> -->

   </form>

</section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
