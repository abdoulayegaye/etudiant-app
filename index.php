<?php
    require_once 'DB/connexion.php';
    require_once 'DB/etudiantDB.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ETUDIANT APP</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include_once 'topBar.php';
        $page = (isset($_GET['page'])) ? $_GET['page'] : '';
        $page = $page . '.php';
        $pages = scandir('view');
        if(in_array($page, $pages))
            include_once 'view/'.$page;
             
    ?>
</body>
</html>