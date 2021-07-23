<?php include_once "../../views/partials/header.php"; ?>
<?php 
    require_once("../../database.php");
    $isSuccess = false;
    if($_POST){
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);

        $statement = $pdo->prepare("INSERT INTO users 
        (userName,userEmail,userPass)
        VALUES (:fullname,:email,:password)");
        $statement->bindValue(':fullname',$fullName);
        $statement->bindValue(':email',$email);
        $statement->bindValue(':password',$password);
        $statement->execute();
        $isSuccess = true;
    }
    
?>
<div class="container">
      <div class="card login-card" style="margin-top: 10%; margin-bottom:10%;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../assets/images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
                <?php if($isSuccess): ?>
                    <div class="alert alert-success">
                        Registration is successful.Login <a href="/auth/login.php">here</a>
                    </div>
                <?php endif; ?>
              <p class="login-card-description">Register now</p>
              <form action="#!" method="POST">
                  <div class="form-group">
                    <label for="fullname" class="sr-only">Full name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full name" required>
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="confirmpassword" class="sr-only">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required> 
                  </div>
                  <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit" value="Register">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">You already have an account? <a href="/auth/login.php" class="text-reset">Login here</a></p>
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
