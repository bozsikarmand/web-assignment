<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 03/04/2019
 * Time: 12:04 PM
 */
session_start();

if (isset($_SESSION["user_id"])) {
    echo "Admin control panel session protected!";
} else {
    header("Location: ../login.php");
}