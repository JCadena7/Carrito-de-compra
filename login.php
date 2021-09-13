<?php

  session_start();

  require 'db/database.php';

  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT  id, usuario, password FROM usuarios WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';
     if(strcmp($_POST['password'], $results['password'])==0){
      $_SESSION['user_id'] = $results['id'];
      header("Location: ventas.php");
   
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>

    <form action="login.php" method="POST" id="formulario_login">
      <div class="mb-2">
      <input name="usuario" type="text" placeholder="User" id="usuario">
      </div>
      <div class="mb-2">
      <input name="password" type="password" placeholder="Password" id="password">
      </div>
      <div id = 'error'></div>
      <input type="submit" value="login">
    </form>
    <script src="js/funciones.js"></script>
  </body>
</html>