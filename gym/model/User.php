<?php 
    include_once 'PDOConn.php';
    class User extends PDOConn {
        private $id_user;
        private $name;

        private $email;
        private $username;
        private $password;

        public function allUsers()
        {
            $sql = "select * from users;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function addUser($name, $email, $username, $password)
        {
            $sql = "insert into users (name, email, username, password) values (:n, :e, :u, :p);";
            $statement = $this->dbh->prepare($sql);
            $result = $statement->execute([":n" => $name, ":e" => $email, ":u" => $username, ":p" => $password]);
            if(!$result)
            {
                echo "error";
                return false;
            }
            echo "success";
            return true;
        }

        public function loginUser($username, $password)
        {
            $sql = "select * from users where username=:u and password=:p;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":u" => $username, ":p" => $password]);
            $rows = $statement->rowCount();
            if($rows == 1)
            {
                return true;
            }
            return false;
        }

        public function getUser($username)
        {
            $sql = "select * from users where username=:u;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":u" => $username]);

            if($statement->rowCount() == 1)
            {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $this->id_user = $row['id_user'];
                $this->name = $row['name'];
                $this->email = $row['email'];
                $this->username = $row['username'];
                $this->password = $row['password'];

                return $this;
            }
        }

        // Getter for id_user
        public function getIdUser() {
            return $this->id_user;
        }

        // Setter for id_user
        public function setIdUser($id_user) {
            // You can add validation or any other logic here
            $this->id_user = $id_user;
        }

        // Getter for name
        public function getName() {
            return $this->name;
        }

        // Setter for name
        public function setName($name) {
            // You can add validation or any other logic here
            $this->name = $name;
        }

        public function getEmail() {
            return $this->email;
        }

        // Setter for name
        public function setEmail($email) {
            // You can add validation or any other logic here
            $this->email = $email;
        }

        // Getter for username
        public function getUsername() {
            return $this->username;
        }

        // Setter for username
        public function setUsername($username) {
            // You can add validation or any other logic here
            $this->username = $username;
        }

        // Getter for password
        public function getPassword() {
            return $this->password;
        }

        // Setter for password
        public function setPassword($password) {
            // You can add encryption or any other logic here
            $this->password = $password;
        }
    }
?>