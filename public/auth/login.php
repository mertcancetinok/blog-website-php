<?php 
     $notFound = false;
     require_once("../../database.php");
     ob_start();
     session_start();
     $returnUrl = isset($_GET['returnUrl']) ? $_GET['returnUrl'] : '/index.php';
     $errors = [];
     if (isset($_SESSION['fullName'])!="" ) {
        header("Location: /index.php");
        exit;
      }

     if($_POST){
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $pass = trim($_POST['password']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        $password = hash('sha256',$pass);

        $statement = $pdo->prepare("SELECT * FROM users
                                    WHERE userEmail=:email");
        $statement->bindValue(":email",$email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if($user){
            if($user['userPass']==$password){
                $_SESSION['userId'] = $user['userId'];
                $_SESSION['fullName'] = $user['userName'];
                $_SESSION['email'] = $user['userEmail'];
                header("Location:".$returnUrl);
            }else{
                $errors[] = "Password is not correct.";
            }
        }else{
            $errors[] = "User not exists.";
        }

     }
    
?>
<?php include_once "../../views/partials/header.php"; ?>
<div class="container">
      <div class="card login-card" style="margin-top: 10%; margin-bottom:10%;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <?php foreach($errors as $error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
              <?php endforeach; ?>
                <p class="login-card-description">Sign into your account</p>
              <form action="#!" method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <a href="/auth/forgot-password.php" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="/auth/register.php" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
</div>
<?php include_once "../../views/partials/footer.php" ?>
