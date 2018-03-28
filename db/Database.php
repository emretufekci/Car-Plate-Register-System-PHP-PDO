<?php
/**
 * Created by PhpStorm.
 * User: Ercan Havare
 * Date: 3/22/2018
 * Time: 6:28 PM
 */

class Database
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbName = DB_NAME;

    public $isConnect;
    private $databaseConnection;

    // connect to database
    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8";

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        try {
            $this->databaseConnection = new PDO($dsn, $this->user, $this->password, $options);
            $this->isConnect = true;
            //echo "Connected Successfully";

        } catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    // disconnect from db
    public function Disconnect()
    {
        $this->databaseConnection = NULL;
        $this->isConnect = false;
    }

    // insert row
    public function insertRow($query, $params = [])
    {
        try {
            $statament = $this->databaseConnection->prepare($query);
            $statament->execute($params);
            return TRUE;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

}