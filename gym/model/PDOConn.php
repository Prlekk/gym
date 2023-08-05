<?php 
    class PDOConn {
        public $dbh;

        public function __construct()
        {
            $this->dbh = new PDO("mysql:dbname=gym;host=127.0.0.1", "root", "Zelenjava12");
        }
    }
?>