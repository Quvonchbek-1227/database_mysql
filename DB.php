<?php 

class DB{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = 'root';
    protected $db = '';


    function __construct($host,$user,$password,$db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }


    public function connection(){
        $connection = mysqli_connect($this->host,$this->user,$this->password,$this->db) or die(mysqli_error($connection));
        return $connection;
    }

    public function send_query($query){

        $result = mysqli_query($this->connection(),$query) or die(mysqli_error($this->connection()));
        return $result;
    }

    public function fetch($result){
       $datas = [];
       
       while ($rows = mysqli_fetch_assoc($result)) {
           $datas[] = $rows;
       }

       return $datas;
    }
     public function sql_check($pharam,$con){
        $result = stripslashes($pharam);
        $result = mysqli_real_escape_string($con,$result);
        return $result;
     }
}

$db = new DB('localhost','root','root','database1');


?>