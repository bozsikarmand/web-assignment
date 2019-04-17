<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 04/04/2019
 * Time: 07:39 PM
 */

session_start();

if (!empty($_SESSION["user_id"])) {
    session_destroy();
}
header("Location: ../includes/bye.php");