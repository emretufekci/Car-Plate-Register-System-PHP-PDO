<?php
/**
 * Created by PhpStorm.
 * User: Ercan Havare
 * Date: 3/22/2018
 * Time: 6:28 PM
 */

class Database{

    public $isConnect;
    protected $databaseConnection;

    // connect to database
    public function __construct($userName="root",$password="",$host="localhost",$dbName="car_plate_program",$options=[]){
        $this->isConnect=TRUE;
        try{
            $this->databaseConnection=new PDO("mysql:host={$host};dnname={$dbName};charset=utf8",$userName,$password,$options);
            echo "Connected Successfully";
        }catch (PDOException $exception){
           throw new Exception($exception->getMessage());
        }
    }

    // disconnect from db
    public function Disconnect(){
        $this->databaseConnection = NULL;
        $this->isConnect = FALSE;
    }

}