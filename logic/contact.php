<?php

/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 31/03/2019
 * Time: 03:05 PM
 */

session_start();
/*
    Error page relative path
    Success page relative path
*/
$errorPageRelativePath = "Location: ../includes/error.php";
$successPageRelativePath = "Location: ../includes/success.php";
/* na, em, tel, top, mes, file, tos */
$name = "";
$email = "";
$tel = "";
$topic = "";
$message = "";
$file = "";
$tos = "";

$fileName = "";
$fileSize = "";
$fileType = "";

if (isset($_POST["form-contact-submit"]) &&
    isset($_POST["form-contact-name"]) &&
    isset($_POST["form-contact-email"]) &&
    isset($_POST["form-contact-tel"]) &&
    isset($_POST["form-contact-topics"]) &&
    isset($_POST["form-contact-message"]) &&
    isset($_POST["form-contact-tos"])) {
    $name = $_POST["form-contact-name"];
    $email = $_POST["form-contact-email"];
    $tel = $_POST["form-contact-tel"];
    $topic = $_POST["form-contact-topics"];
    $message = $_POST["form-contact-message"];

    $record = "Name: " . $name . PHP_EOL .
            "Email: " . $email . PHP_EOL .
            "Tel: " . $tel . PHP_EOL .
            "Topic: " . $topic . PHP_EOL . PHP_EOL .
            "Message: " . PHP_EOL . PHP_EOL . $message;

    $messageDir = "../storage/email/";
    $messageFileName = "user-message-" . sha1(time());
    $messagePath = $messageDir . $messageFileName;

    $handler = fopen($messagePath,'c');
    fwrite($handler, $record);
    fclose($handler);
}
if (isset($_POST["form-contact-submit"]) &&
    isset($_POST["form-contact-name"]) &&
    isset($_POST["form-contact-email"]) &&
    isset($_POST["form-contact-tel"]) &&
    isset($_POST["form-contact-topics"]) &&
    isset($_POST["form-contact-message"]) &&
    isset($_FILES['form-contact-file-upload']) &&
    isset($_POST["form-contact-tos"])) {
    $name = $_POST["form-contact-name"];
    $email = $_POST["form-contact-email"];
    $tel = $_POST["form-contact-tel"];
    $topic = $_POST["form-contact-topics"];
    $message = $_POST["form-contact-message"];

    echo "<pre>";
    echo print_r($_FILES);
    echo "</pre>";

    // Ref.:
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Complete_list_of_MIME_types
    $fileTypes = array(
        "doc",
        "docx",
        "xls",
        "xlsx",
        "jpg",
        "jpeg",
        "png",
        "gif",
        "webp",
        "pdf"
    );

    $uploadedFileOriginalName = $_FILES['form-contact-file-upload']["name"];
    $uploadedFileTemporaryName = $_FILES['form-contact-file-upload']["tmp_name"];
    $uploadedFileTemporaryExtension = strtolower("." . pathinfo($uploadedFileOriginalName, PATHINFO_EXTENSION));
    $uploadDir = "../storage/uploads/";
    $uploadedFileFinalName = "user-upload-" . sha1(time());
    $uploadedFileFinalExtension = $uploadedFileTemporaryExtension;
    $uploadedFileFinalNameExtension = $uploadedFileFinalName . $uploadedFileFinalExtension;

    /* Flag-ek */
    $notAllowedExtension = false;
    $_SESSION["SessionNotAllowedExtension"] = false;
    $isFileTooLarge = false;
    $_SESSION["SessionIsFileTooLarge"] = false;
    $fileExistsWithSameName = false;
    $_SESSION["SessionFileExistsWithSameName"] = false;
    $isElementPlacedIntoArray = true;
    $_SESSION["SessionIsElementPlacedIntoArray"] = true;

    if (!in_array($uploadedFileTemporaryExtension, $fileTypes)) {
        $notAllowedExtension = true;
        $_SESSION["SessionNotAllowedExtension"] = true;
        header($errorPageRelativePath);
    }

    $fileSizeMaximum = 2 * 1024 * 1024;
    $fileSize = filesize($uploadedFileTemporaryName);

    if ($fileSize > $fileSizeMaximum) {
        $isFileTooLarge = true;
        $_SESSION["SessionIsFileTooLarge"] = true;
        header($errorPageRelativePath);
    }

    if (in_array($uploadedFileTemporaryExtension, $fileTypes)) {
        if (file_exists($uploadedFileFinalNameExtension)) {
            $fileExistsWithSameName = true;
            $_SESSION["SessionFileExistsWithSameName"] = true;
            header($errorPageRelativePath);
        } else {
            move_uploaded_file($uploadedFileTemporaryName,
                $uploadDir .
                $uploadedFileFinalNameExtension);
            $isElementPlacedIntoArray = true;
            $_SESSION["SessionIsElementPlacedIntoArray"] = true;
            header($successPageRelativePath);
        }
    } else {
        $isElementPlacedIntoArray = false;
        $_SESSION["SessionIsElementPlacedIntoArray"] = false;
        header($errorPageRelativePath);
    }
}