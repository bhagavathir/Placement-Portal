<?php

class Database
{
    public static $conn;
    public static function getObject()
    {
        if (!self::$conn){
            self::$conn = new mysqli("localhost","root","","placement_portal");
            if (self::$conn -> connect_errno) {
                echo "Failed to connect to MySQL: " . self::$conn -> connect_error;
                exit();
                }
            
            if(!self::$conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }
            
    }
    //var_dump(self::$conn);
    return self::$conn;
    }
    
}


$user=new Database();
$user->getObject();

?>