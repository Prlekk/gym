<?php 
    include_once 'PDOConn.php';
    class Routines extends PDOConn {
        private $id_routine;
        private $id_user;
        private $title;

        public function allRoutines()
        {
            $sql = "select * from Routines;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function userSpecificRoutines($id_user)
        {
            $sql = "select * from routines where id_user=:i;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":i" => $id_user]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function deleteRoutine($id_routine)
        {
            $sql = "delete from routines where id_routine=:i;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":id" => $id_routine]);
            if(!$statement)
            {
                return false;
            }
            return true;
        }

        public function getRoutine($id_routine)
        {
            $sql = "select * from routines where id_routine=:i;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":i" => $id_routine]);

            if($statement->rowCount() == 1)
            {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $this->id_routine = $row['id_routine'];
                $this->id_user = $row['id_user'];
                $this->title = $row['title'];

                return $this;
            }
        }

        // Getter for id_routine
        public function getIdRoutine() {
            return $this->id_routine;
        }

        // Setter for id_routine
        public function setIdRoutine($id_routine) {
            // You can add validation or any other logic here
            $this->id_routine = $id_routine;
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

        // Getter for title
        public function getTitle() {
            return $this->title;
        }

        // Setter for title
        public function setTitle($title) {
            // You can add validation or any other logic here
            $this->title = $title;
        }
    }
?>