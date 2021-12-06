
<?php

// define constant variables
define('DB_NAME', 'productdb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

try{

    // connection variable
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // encoded...
    mysqli_set_charset($con, 'utf8');


}catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;
        public $tablename2;
        

        
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed please come back later" . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute...
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql for creating....
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (50) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100),
                             price_before FLOAT,
                             product_description VARCHAR(50)
                            );";

            
            if (!mysqli_query($this->con, $sql)){
                echo "Error while creating table: " . mysqli_error($this->con);
            }
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
             product_name VARCHAR (50) NOT NULL,
             product_price FLOAT,
             product_image VARCHAR (100),
             price_before FLOAT,
             product_description VARCHAR(50)
            );";

        }else{
            return false;
        }
    }
//products from db

    public function get_data(){
    $sql = "SELECT * FROM $this->tablename";
    $result = mysqli_query($this->con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        return $result;
    }
    }


 

}
?>