<?php

use core\library\Path as Path;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Page not Found</title>
    <style>
        body::after{
            content: "";
            background: url('<?= Path::baseUrl()?>/assets/coffee.jpg');
            opacity: 0.6;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            right: 0;
            position: absolute;
            z-index: -1;
        }
    </style>
</head>
<body >
<h1 style="text-align: center">404 Page Not Found</h1>
</body>
</html>