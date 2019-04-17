<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 27/03/2019
 * Time: 07:26 PM
 */

session_start();
/*
    Error page relative path
    Success page relative path
*/
$errorPageRelativePath = "Location: ../includes/error.php";
$successPageRelativePath = "Location: ../includes/success.php";

if (
    isset($_POST["form-register-username"]) &&
    isset($_POST["form-register-password"]) &&
    isset($_POST["form-register-password-repeat"]) &&
    isset($_POST["form-register-email"]) &&
    isset($_POST["form-register-role"])
)
{
    $userName = $_POST["form-register-username"];
    $password = $_POST["form-register-password"];
    $passwordRepeat = $_POST["form-register-password-repeat"];
    $EMail = $_POST["form-register-email"];
    $role = $_POST["form-register-role"];

    $record = $userName . "," . $password . "," . $EMail . "," . $role . PHP_EOL;

    $flatDB = '../storage/db.armand';

    // Flag-ek
    $isUserExisting = false;
    $isUserNameTaken = false;
    $isPasswordTaken = false;
    $passwordNotMatch = false;
    $isEmailTaken = false;
    $isRegisterSuccessful = false;
    /* Session parameterek */
    $_SESSION["SessionIsUserExisting"] = false;
    $_SESSION["SessionIsUserNameTaken"] = false;
    $_SESSION["SessionIsPasswordTaken"] = false;
    $_SESSION["SessionPasswordNotMatch"] = false;
    $_SESSION["SessionIsEmailTaken"] = false;
    $_SESSION["SessionIsRegisterSuccessful"] = false;


    if ($password != $passwordRepeat) {
        $passwordNotMatch = true;
        $_SESSION["SessionPasswordNotMatch"] = true;
        header($errorPageRelativePath);
    }

    if (!file_exists($flatDB)) {
        $handler = fopen($flatDB,'c');
        fclose($handler);
    }
    if (file_exists($flatDB)) {
        if (filesize($flatDB) == 0) {
            $handler = fopen($flatDB,'a');
            fwrite($handler, $record);
            fclose($handler);
            $isRegisterSuccessful = true;
            $_SESSION["SessionIsRegisterSuccessful"] = true;
            header($successPageRelativePath);
        } else {
            $ArrayFromFile = file($flatDB);

            foreach ($ArrayFromFile as $user) {
                $userRecordArray = explode(',', $user);

                // User letezik-e az adatbazisban
                if ($userRecordArray[0] == $userName) {
                    $isUserNameTaken = true;
                    $isUserExisting = true;
                    $_SESSION["SessionIsUserNameTaken"] = true;
                    $_SESSION["SessionIsUserExisting"] = true;
                    header($errorPageRelativePath);
                }
                if ($userRecordArray[1] == $password) {
                    $isPasswordTaken = true;
                    $_SESSION["SessionIsPasswordTaken"] = true;
                    header($errorPageRelativePath);
                }
                if ($userRecordArray[2] == $EMail) {
                    $isEmailTaken = true;
                    $_SESSION["SessionIsEmailTaken"] = true;
                    header($errorPageRelativePath);
                }
            }
            if ($_SESSION["SessionIsUserExisting"] == false &&
                $_SESSION["SessionIsUserNameTaken"] == false &&
                $_SESSION["SessionIsPasswordTaken"] == false &&
                $_SESSION["SessionIsEmailTaken"] == false) {
                $handler = fopen($flatDB,'a');
                fwrite($handler, $record);
                fclose($handler);
                $isRegisterSuccessful = true;
                $_SESSION["SessionIsRegisterSuccessful"] = true;
                header($successPageRelativePath);
            }
        }
    }
}
else {
    $userName = "";
    $password = "";
    $passwordRepeat = "";
    $EMail = "";
    $role = "";
    $isRegisterSuccessful = false;
    $_SESSION["SessionIsRegisterSuccessful"] = false;
    header($errorPageRelativePath);
}