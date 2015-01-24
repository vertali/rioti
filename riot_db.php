<?php

function checkChampion($id) {
    $dbc = mysqli_connect("localhost", "root", "x1a2m3pp");
    if (!$dbc) {
        echo "Problem kod povezivanja na bazu podataka!";
        exit;
    }

    $db = mysqli_select_db($dbc, "rioti");
    if (!$db) {
        echo "Problem kod selektiranja baze podataka!";
        exit;
    }
    
    $sql = "select * from champions where id = '$id'";

    $rs = mysqli_query($dbc, $sql);
    
    if (!$rs) {
        echo "Problem kod upita na bazu podataka!";
        exit;
    }
    
    $row = mysqli_fetch_array($rs);
    mysqli_close($dbc);

    if (empty($row)) {
        return false;
    } else {
        return $row;
    }
}

function saveChampion($id, $name, $title) {
    $dbc = mysqli_connect("localhost", "root", "x1a2m3pp");
    if (!$dbc) {
        echo "Problem kod povezivanja na bazu podataka!";
        exit;
    }

    $db = mysqli_select_db($dbc, "rioti");
    if (!$db) {
        echo "Problem kod selektiranja baze podataka!";
        exit;
    }
    
    $sql = "insert into champions (id, name, title) values ($id, '$name', '$title')";
    
    $rs = mysqli_query($dbc, $sql);
    
    mysqli_close($dbc);

    if ($rs) {
        return true;
    } else {
        echo "Problem kod upita na bazu podataka!";
        exit;
    }
}

?>