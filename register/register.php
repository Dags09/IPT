<?php
$errors = array();
if(isset($_POST['register'])){
  $username = preg_replace('/[^A-Za-z]/','',$_POST['username']);
  $email = $_POST['email'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  
  if(file_exists('../users/' . $username . '.xml')){
    $errors[] = 'Username already exists';
  }
  if($username == ''){
    $errors[] = 'Username is blank';
  }
  if($email == ''){
    $errors[] = 'Email is blank';
  }
  if($password == '' || $c_password == ''){
    $errors[] = 'Passwords are blank';
  }
  if($password != $c_password){
    $errors[] = 'Passwords do not match';
  }
  if(count($errors) == 0){
    $xml = new SimpleXMLElement('<users></users>');
    $xml->addchild('password',md5($password));
    $xml->addchild('email',$email);
    $xml->asXML('../users/' . $username . '.xml');
    header('Location:../../index.php');
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/register.css">
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
      <source src="../img/vid1.mp4" type="video/mp4">
  </video>
  <div class="inner-container">
    <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="../img/vid1.mp4" type="video/mp4">
    </video>
    <form method="post" action="">
      <div class="box">
        <h1>Register</h1>
        <?php
        if(count($errors)>0 ){
          echo '<u1>';
          foreach($errors as $e){
            echo '<li>' . $e . '' . '</li>';
          }
          echo '</u1>';
        }
        ?>
        <input type="text" name="username" size="20" placeholder="User Name" required />
        <input type="text" name="email" size="20" placeholder="Email" required/>
        <input type="password" name="password" size="20" placeholder="Password" required/>
        <input type="password" name="c_password" size="20" placeholder="Confrim Password" required/>
        <button type="submit" value="Register" name="register">Register</button>
    </form>
      <a href="../index.php">Go Back</a>
    </div>
  </div>
</div>
</body>
</html>