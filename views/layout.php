<?php
use Core\library\Path as Path;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title : 'Title'  ?></title>
    <link href="<?= Path::baseUrl()?>/vendor/twitter/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Path::baseUrl()?>/assets/grid.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= \Core\library\Path::baseUrl()?>/assets/menu.css"/>
</head>
<body>
<script src="<?= Path::baseUrl()?>/vendor/components/jquery/jquery.js"></script>
<script src="<?= Path::baseUrl()?>/vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

    <?php view('menu'); ?>
<div class= "main" style="height:100%">
    <?php view($contentView,$data) ?>
</div>

<?php view('footer'); ?>

</body>
</html>