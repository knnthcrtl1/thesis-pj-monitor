<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="./assets/css/custom.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

              <div class="col-lg-6" style="background-color: #ffffff; margin-top: 60px; border-radius: 20px">
                <div class="p-5">
                  <div class="text-center">
                    <img class="app__logo" src="admin/img/app-logo.jpg" style="max-width: 300px;"/>
                    <h1 class="h4 text-gray-900 mb-4" style="margin-top: 20px">Welcome Back!</h1>
                  </div>
                  <?php
            include('./connection.php');
            session_start();
		    if(isset($_POST["admin-login"])){
			 $_SESSION["user_client"] = $_POST["user"];
			 $_SESSION["pass"] = md5($_POST["pass"]);
			 $_SESSION['last_time'] = time();
			 {
			 if(!empty($_POST['user']) && !empty(md5($_POST['pass']))) {
			 $user = $_POST['user'];
			 $pass = md5($_POST['pass']);
			 //selecting database
			 $query = mysqli_query($conn, "SELECT * FROM tbl_users WHERE user_username='".$user."' AND user_password='".$pass."'");
			 $numrows= mysqli_num_rows($query);
			 if($numrows !=0)
			 {
			 while($row = mysqli_fetch_assoc($query))
			 {
			 $username=$row['user_username'];
       $password=$row['user_password'];
       $userLevel=$row['user_level'];
       $userId=$row['user_user_id'];
			 }
			 if($user == $username && $pass == $password)
			 {
       $_SESSION['user_level'] = $userLevel;
       $_SESSION["user_id"] = $userId;

			 //Redirect Browser
             header('Location:view_project.php');
             exit();
			 }
			 }
			 else
			 {
                session_destroy();
			 echo "Invalid Username or Password!";
			 }
			 }
			 else
			 {
                session_destroy();
			 echo "Required All fields!";
			 }
			 }
            }
            ?>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="name" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <!-- <div class="form-group">
                      <input type="email" name="user" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div> -->
                    <div class="form-group">
                      <input type="password" name="pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <input type="submit" value="Login" name="admin-login" class="btn btn-primary btn-user btn-block" > 
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
