<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 27/03/2019
 * Time: 07:26 PM
 */

session_start();

if (isset($_POST["form-login-username"]) &&
    isset($_POST["form-login-password"]))
{
    $userName = $_POST["form-login-username"];
    $password = $_POST["form-login-password"];

    $flatDB = file("../storage/db.armand");

    $isUserExisting = false;

    foreach ($flatDB as $user) {
        $userRecordArray = explode(',', $user);

        if ($userRecordArray[0] == $userName && $userRecordArray[1] == $password) {
            $isUserExisting = true;
            break;
        }
    }

    if ($isUserExisting) {
        $_SESSION["user_id"] = sha1($userName);
        echo "Hello $userName You have successfully logged in!";
        header("Location: ../includes/protected/user-control-panel.php");
    }
    else {
        echo "Some of your credentials are wrong and/or you have not registered yet!";
        header("Location: ../includes/login.php");

    }
}
else {
    $userName = "";
    $password = "";
    header("Location: ../includes/login.php");
}