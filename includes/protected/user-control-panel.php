<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 03/04/2019
 * Time: 10:18 AM
 */

session_start();

if (isset($_SESSION["user_id"])) {
    echo "User control panel session protected!";
} else {
    header("Location: ../login.php");
}
