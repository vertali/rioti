<?php

class DB {

    private static $dbHost = "localhost";
    private static $dbUser = "root";
    private static $dbPassword = "x1a2m3pp";
    private static $dbName = "rioti";
    private static $isConnected = false;
    private static $dbc = null;

    private static function connect() {
        if (DB::$isConnected)
            return;

        DB::$dbc = mysqli_connect(DB::$dbHost, DB::$dbUser, DB::$dbPassword);
        if (!DB::$dbc) {
            echo "Problem kod povezivanja na bazu podataka!";
            exit;
        }

        $db = mysqli_select_db(DB::$dbc, DB::$dbName);
        if (!$db) {
            echo "Problem kod odabira baze podataka!";
            exit;
        }

        DB::$isConnected = true;
    }

    public static function checkCampion($id) {
        DB::connect();

        $sql = "select * from champions where id = '$id'";
        $rs = mysqli_query(DB::$dbc, $sql);
        if (!$rs) {
            echo "Problem kod upita na bazu podataka!";
            exit;
        }
        $row = mysqli_fetch_array($rs);

        if (empty($row)) {
            return false;
        } else {
            return $row;
        }
    }

    public static function saveChampion($id, $name, $title) {
        DB::connect();

        $sql = "insert into champions (id, name, title) values ($id, '$name', '$title')";
        $rs = mysqli_query(DB::$dbc, $sql);

        if ($rs) {
            return true;
        } else {
            echo "Problem kod upita na bazu podataka!";
            exit;
        }
    }

    public static function checkSummoner($name, $server) {
        DB::connect();

        $sql = "select * from summoners where name = '$name' and server = '$server'";
        $rs = mysqli_query(DB::$dbc, $sql);
        if (!$rs) {
            echo "Problem kod upita na bazu podataka!";
            exit;
        }
        $row = mysqli_fetch_array($rs);

        if (empty($row)) {
            return false;
        } else {
            return $row;
        }
    }

    public static function saveSummoner($id, $name, $level, $server) {
        DB::connect();

        $sql = "insert into summoners (id, name, level, server) values ($id, '$name', $level, '$server')";
        $rs = mysqli_query(DB::$dbc, $sql);

        if ($rs) {
            return true;
        } else {
            echo "Problem kod upita na bazu podataka!";
            exit;
        }
    }

}

?>