<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <?php 
        include_once 'model/User.php';
        include_once 'model/Weights.php';
        include_once 'model/Routines.php';
        include_once 'model/Exercises.php';
        $user = new User();
        $weight = new Weights();
        $routines = new Routines();
        $exercises = new Exercises();
        $table = $user->allUsers();
        #$user->addUser("rit", "mala@gmail.com", "mala", "malarit123");
        /*
        if($user->loginUser("rit", "rit123"))
        {
            echo "success";
        }
        if($user->loginUser("rit", "rit1234"))
        {
            echo "success";
        }else {
            echo "error";
        }
        */ 
    ?>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>id_user</th>
            <th>name</th>
            <th>email</th>
            <th>username</th>
            <th>password</th>
        </tr>
        <?php 
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['id_user'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>id_weights</th>
            <th>id_users</th>
            <th>date</th>
            <th>weight</th>
        </tr>
        <?php 
            $table = $weight->allWeights();
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['id_weights'] . "</td>";
                    echo "<td>" . $row['id_users'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['weight'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>id_routine</th>
            <th>id_user</th>
            <th>title</th>
        </tr>
        <?php 
            $table = $routines->allRoutines();
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['id_routine'] . "</td>";
                    echo "<td>" . $row['id_user'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table> 
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>id_exercise</th>
            <th>id_routine</th>
            <th>name</th>
            <th>date</th>
            <th>weight</th>
            <th>reps</th>
        </tr>
        <?php 
            $table = $exercises->allExercises();
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['id_exercise'] . "</td>";
                    echo "<td>" . $row['id_routine'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['weight'] . "</td>";
                    echo "<td>" . $row['reps'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table >
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>My Routines</th>
        </tr>
        <?php 
            $table = $routines->userSpecificRoutines(7);
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>name</th>
        </tr>
        <?php 
            $table = $exercises->routineSpecificExercises(6);
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>date</th>
            <th>weight</th>
            <th>reps</th>
        </tr>
        <?php
            $table = $exercises->specificExercise('bicep curls');
            foreach($table as $row)
            {
                echo "<tr>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['weight'] . "</td>";
                    echo "<td>" . $row['reps'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>