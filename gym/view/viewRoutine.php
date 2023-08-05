<?php 
    session_start();
    include_once '../model/Routines.php';
    include_once '../model/Exercises.php';
    $r = new Routines();
    $routine = $r->getRoutine($_GET['id_routine']);
    include_once 'head.php';
?>
<body>
    <main id="mainRoutineDashboard">
        <button class="backToDashboard"><-</button>
        <h1 id="routineTitle"><?php echo $r->getTitle() ?></h1>
        <section id="exercisesDashboard">
            <?php
                $exercises = new Exercises();
                $table = $exercises->routineSpecificExercises($_GET['id_routine']);
                foreach($table as $row)
                {
                    echo "<table class='exercisesTable' >";
                        echo "<tr>";
                            echo "<th colspan='5'>" . $row['name'] . "</th>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<th>Date</th>";
                            echo "<th>Weight</th>";
                            echo "<th>Reps</th>";
                            echo "<th colspan='2'>Customization</th>";
                        echo "</tr>";
                        $inlineTable = $exercises->specificExercise($row['name']);
                        foreach($inlineTable as $inlineRow)
                        {
                            echo "<tr>";
                                echo "<td>" . $inlineRow['date'] . "</td>";
                                echo "<td class='exerciseWeight'>" . $inlineRow['weight'] . "</td>";
                                echo "<td class='exerciseReps'>" . $inlineRow['reps'] . "</td>";
                                echo "<td class='editExercise'><button class='editExerciseButton'>Edit</button></td>";
                                echo "<td class='deleteExercise'><button class='deleteExerciseButton'>X</button></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                            echo "<td class='addExercise' colspan='5'><button class='addExerciseButton'>+</button></td>";
                        echo "</tr>";
                        #echo "<tr><td colspan"
                    echo "</table>";

                    
                }
            ?>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>