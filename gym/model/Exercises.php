<?php 
    include_once 'PDOConn.php';
    class Exercises extends PDOConn {
        private $id_exercise;
        private $id_routine;
        private $name;
        private $date;
        private $weight;
        private $reps;

        public function allExercises()
        {
            $sql = "select * from exercises;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function routineSpecificExercises($id_routine)
        {
            $sql = "select distinct name from exercises where id_routine=:i;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":i" => $id_routine]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function specificExercise($name)
        {
            $sql = "select * from exercises where name like :n order by date;";
            $statement = $this->dbh->prepare($sql);
            $statement->execute([":n" => $name]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // Getter for id_exercise
        public function getIdExercise() {
            return $this->id_exercise;
        }

        // Setter for id_exercise
        public function setIdExercise($id_exercise) {
            // You can add validation or any other logic here
            $this->id_exercise = $id_exercise;
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

        // Getter for name
        public function getName() {
            return $this->name;
        }

        // Setter for name
        public function setName($name) {
            // You can add validation or any other logic here
            $this->name = $name;
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

        // Getter for reps
        public function getReps() {
            return $this->reps;
        }

        // Setter for reps
        public function setReps($reps) {
            // You can add validation or any other logic here
            $this->reps = $reps;
        }
    }
?>