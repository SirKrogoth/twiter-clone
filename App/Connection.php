<?php

namespace App;

class Connection
{
    public static function getDb()
    {
        try
        {
            $conn = new \PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                ""
            );
        }
        catch(\PDOException $e)
        {
            //Tratar essa bagaça
        }
    } 
}

?>