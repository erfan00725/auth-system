<?php
declare(strict_types=1);

require "includes/header.php";
require "./config.php";

if (isset($_POST['submit'])) {
  if ($_POST['email'] && $_POST['pass']) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $login = $connection->query("SELECT * FROM users WHERE email = '$email'");
    
    $login->execute();

    $data = $login->fetch(PDO::FETCH_ASSOC);

    if ($login->rowCount() > 0) {
      if (password_verify($pass, $data['pass'])) {
        echo 'login succisfuly';
      }else {
        echo 'user or password is incorrect';
      }
    }else {
      echo 'user or password is incorrect';
    }
    
  }else{
    echo "All fields are required";
  }
}

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
