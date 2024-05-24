<?php
$error = false;
$message = "";

if (isset($_POST['login'] )){
    $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
    $password = md5($_POST['password']);
    if(file_exists('IPT/users/' . $username . '.xml')){
        $xml = new SimpleXMLElement('users/' . $username . '.xml', 0, true);
        if($password == $xml->password){
            session_start();
            $_SESSION['username'] = $username;
            header('Location: IPT/main.php');
            die;
        } else {
            $error = true;
            $message = "Incorrect password. Please try again.";
        }
    } else {
        $error = true;
        $message = "Username not found. Please register first.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="IPT/css/login.css">
  <title>Log-in</title>
  <style>
  .error {
    margin-top: -15px;
    color: red;
    font-size: 15px;
  }
  </style>
</head>
<body>
<div class="vid-container">
  <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="IPT/img/vid1.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="IPT/img/vid1.mp4" type="video/mp4">
    </video>
    <form method="post" action="">
      <div class="box">
        <h1>Login</h1>
        <?php if ($error): ?>
          <div class="error"><?php echo $message; ?></div>
        <?php endif; ?>
        <input class="input" type="text" name="username" size="20" placeholder="User Name" required />
        <input class="input" type="password" name="password" size="20" required placeholder="Password" />
        <button type="submit" value="Login" name="login">Login</button>
    </form>
      <a href="IPT/register/register.php">Register</a>
    </div>
  </div>
</div>
</body>
</html>