<?php
// database.php
class Database
{
    public function dbConnection()
    {
        // $db_host = "localhost";
        // $db_name = "u352929645_akshadaa_main";
        // $db_username = "u352929645_akshadaa_main";
        // $db_password = "Ecct@29052000";
        $db_host = "us-cdbr-east-04.cleardb.com";
        $db_username = "b14a207143d272";
        $db_password = "148155f8";
        $db_name = "heroku_47c60d4bda8cc71";

        $dsn_db = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
        try {
            $site_db = new PDO($dsn_db, $db_username, $db_password);
            $site_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $site_db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
