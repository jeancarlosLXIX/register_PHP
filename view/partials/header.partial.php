<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="style/i.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['title']; ?></title>
    <link rel="stylesheet" href="style/style.css">
    <script src="JS/selects.js" defer></script>
</head>
<body>

<ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo "$_SESSION[name] $_SESSION[lastname]"; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add.php">Agregar equipos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="showPC.php">Ver equipos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../model/send.php">salir</a>
        </li>
      </ul>
      <div class="line"></div>