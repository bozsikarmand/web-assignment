<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 27/03/2019
 * Time: 07:26 PM
 */

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

    $flatDB = fopen("../storage/db.armand","a");

    $isPasswordSame = false;
    $isUserFound = false;
    $isPasswordSameInDB = false;
    $isEMailSameInDB = false;

    /*while (!feof($flatDB))
    {
        $currentUserRecord = fgets($flatDB);
        $currentUserRecordSplit = explode(",",$currentUserRecord);

        if (trim($currentUserRecordSplit[0]) == $userName)
        {
            // User with same username is present!
            $isUserFound = true;
            break;
        }
        if (trim($currentUserRecordSplit[1]) == $password)
        {
            // User with same password is present! Choose another!
            $isPasswordSameInDB = true;
            break;
        }
        if (trim($currentUserRecordSplit[3]) == $EMail)
        {
            // User with same email address is present! Choose another!
            $isEMailSameInDB = true;
            break;
        }
    }
    fclose($flatDB);*/

    if ($password === $passwordRepeat)
    {
        $savedRecord = $userName . "," . $password . "," . $EMail . "," . $role;
        fwrite($flatDB, $savedRecord);
        fclose($flatDB);
    }
    else
    {
        $isPasswordSame = true;
    }
}
else {
    $userName = "";
    $password = "";
    $passwordRepeat = "";
    $EMail = "";
    $role = "";
}