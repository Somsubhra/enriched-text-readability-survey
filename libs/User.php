<?php

class User {

    public static function nameFromId($id) {

        $query = "SELECT name FROM user WHERE id=:id";

        $res = DB::query($query, array(
            "id" => $id
        ));

        $name = "";

        while($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $name = $row["name"];
        }

        return $name;
    }
} 