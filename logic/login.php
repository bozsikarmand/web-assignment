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
    $isRoleAdmin = false;

    foreach ($flatDB as $user) {
        $userRecordArray = explode(',', $user);

        if ($userRecordArray[0] === $userName && $userRecordArray[1] === $password) {
            $isUserExisting = true;
            break;
        }
    }

    if ($isUserExisting == true) {
        $_SESSION["user_id"] = sha1($userName);
        $_SESSION["user_exists"] = true;
        $_SESSION["user_exists_message"] = "Hello, $userName! You have successfully logged in!";
        header("Location: ../includes/protected/control-panel.php");
    }
    else {
        $_SESSION["user_exists"] = false;
        $_SESSION["user_not_exists_message"] = "The provided credentials are wrong and/or you are not yet registered!";
        header("Location: ../includes/error.php");
    }
}
else {
    header("Location: ../includes/login.php");
}