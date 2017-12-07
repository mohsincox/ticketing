<?php
	$hostname_wallboard = "localhost";
    $database_wallboard = "asterisk";
    $username_wallboard = "root";
    $password_wallboard = "";
    $wallboard = mysqli_connect($hostname_wallboard, $username_wallboard, $password_wallboard) or trigger_error(mysqli_error(),E_USER_ERROR);

?>