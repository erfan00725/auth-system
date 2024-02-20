<?php
declare(strict_types=1);

require "includes/header.php";
require "./config.php";


if (key_exists('submit' , $_POST)) {
  if ($_POST['email'] && $_POST['username'] && $_POST['password']) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    $stmnt = $connection->prepare("INSERT INTO users(user, email, pass) VALUE(:user, :email, :pass)");
    if (    $stmnt->execute([
      "user" => $user,
      "email" => $email,
      "pass" => password_hash($pass, PASSWORD_BCRYPT, ['cost' => 12])
    ])) {
      echo "register succisfuly!";
    }

  }else{
    echo "All fields are required";
  }
}

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="register.php">
   
    <h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">register</button>
    <h6 class="mt-3">Aleardy have an account?  <a href="login.php">Login</a></h6>

  </form>
</main>
<?php require "includes/footer.php"; ?>
