<?php 
    session_start();
    include_once '../model/Routines.php';
    $routines = new Routines();
    if(isset($_GET['deleteRoutine']))
    {
        $routines->deleteRoutine($_GET['deleteRoutine']);
    }
    include_once 'head.php';
?>
<body>
    <main id="mainDashboard">
        <?php 
            if(!isset($_SESSION['username']['username']))
            {
                header("Location:loginUser.php");
            }else {
                echo "<p class='signedUser'> Signed in as: <strong><i>" . $_SESSION['username']['username'] . "</i></strong></p>";
            }
        ?>
        <section class="dashboardFitness">
            <div class="dashboardRoutines">
                <table class="routinesTable">
                    <tr>
                        <th colspan="2">My Routines</th>
                    </tr>
                    <?php 
                        $table = $routines->userSpecificRoutines($_SESSION['id_user']['id_user']);
                        foreach($table as $row)
                        {
                            echo "<tr>";
                                echo "<td><a href='viewRoutine.php?id_routine=" . $row['id_routine'] . "'>" . $row['title'] . "</a></td>";
                                echo "<td><button class='deleteRoutine'><a class='deleteRoutineText' href='dashboard.php?deleteRoutine=" . $row['id_routine'] . "'>X</a></button>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="dashboardCalories"></div>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>