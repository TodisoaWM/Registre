<?php
include "page/config.php";
// fonction permet de scanner une dossier et d'afficher son contenue sur la page d' accueil 
$scanPage = scandir('page/');
if (isset($_GET['page']) and !empty($_GET['page']) && in_array($_GET['page'] . '.php', $scanPage)) {
     $page = $_GET['page'];
} else {
     $page = 'accueil';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <a href="index.php?page=test">test</a>
     <a href="index.php?page=accueil">accueil</a>
     <section>
          <?php
          include('page/' . $page . '.php');
          ?>
     </section>

</body>

</html>