<?php
/**
 * Created by PhpStorm.
 * User: bozsi
 * Date: 05/04/2019
 * Time: 12:55 PM
 */

function dataToTable($flatDB)
{
    while (($line = fgets($flatDB)) != false) {
        echo "<tr>";
        $data = explode(",", $line);

        foreach ($data as $tdata) {
            echo "<td>" . trim($tdata) . "</td>";
        }
        echo "</tr>";
    }
}