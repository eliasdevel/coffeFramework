<?php

use core\library\Path as Path;
?>
<form action="<?= Path::baseUrl()?>/elias/save" method="post">

    <label for="name" >Name:</label>
    <input type="text" name="name" />

    <label for="name" >Email:</label>
    <input type="email" name="email" />

</form>