<?php

require_once '../var/DBConfig.php';

class DB {

    private static function connect() {

        if(DB::$conn == null) {

            try {
                DB::$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=ETRS", DB_USER_NAME, DB_PASSWORD);
                DB::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                DB::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            catch(PDOException $ex) {
                die($ex->getMessage());
            }
        }

        return DB::$conn;
    }

    private static function run($query, $vars) {
        DB::connect();

        $stmt = DB::$conn->prepare($query);
        $stmt->execute($vars);

        return $stmt;
    }

    public static function query($query, $vars) {
        return DB::run($query, $vars);
    }

    public static function insert($query, $vars) {
        DB::run($query, $vars);
        return DB::$conn->lastInsertId();
    }

    public static function update($query, $vars) {
        DB::run($query, $vars);
    }

    public static function delete($query, $vars) {
        DB::run($query, $vars);
    }

    private static $conn;
}