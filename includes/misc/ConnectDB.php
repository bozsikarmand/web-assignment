<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 05/04/2019
 * Time: 12:52 PM
 */

function ConnectDB()
{
    $flatDB = fopen("../../storage/db.armand", "r");
    return $flatDB;
}