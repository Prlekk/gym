<?php 
    include_once 'PDOConn.php';
    class Weights extends PDOConn {
        private $id_weights;
        private $id_users;
        private $date;
        private $weight;

        public function allWeights()
        {
            $sql = "select * from weights;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // Getter for id_weights
        public function getIdWeights() {
            return $this->id_weights;
        }

        // Setter for id_weights
        public function setIdWeights($id_weights) {
            // You can add validation or any other logic here
            $this->id_weights = $id_weights;
        }

        // Getter for id_users
        public function getIdUsers() {
            return $this->id_users;
        }

        // Setter for id_users
        public function setIdUsers($id_users) {
            // You can add validation or any other logic here
            $this->id_users = $id_users;
        }

        // Getter for date
        public function getDate() {
            return $this->date;
        }

        // Setter for date
        public function setDate($date) {
            // You can add validation or any other logic here
            $this->date = $date;
        }

        // Getter for weight
        public function getWeight() {
            return $this->weight;
        }

        // Setter for weight
        public function setWeight($weight) {
            // You can add validation or any other logic here
            $this->weight = $weight;
        }
    }
?>