<?php 
    include_once '../model/User.php';
    if(isset($_POST['submit']))
    {
        $u = new User();

        $name = escapeshellcmd(htmlspecialchars($_POST['name']));
        $email = escapeshellcmd(htmlspecialchars($_POST['email']));
        $username = escapeshellcmd(htmlspecialchars($_POST['username']));
        $password = escapeshellcmd(htmlspecialchars($_POST['password']));
        
        if($u->addUser($name, $email, $username, $password))
        {
            header("Location:loginUser.php");
        }
        echo "error";
    }
    include_once 'head.php';
?>
<body>
    <main class="registerDiv">
        <form class="registerForm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <h1 class="registerTitle">Register</h1>
            <input class="registerInput" type="text" name="name" id="name" placeholder="Name..." required>
            <input class="registerInput" type="email" name="email" id="email" placeholder="Email..." required>
            <input class="registerInput" type="text" name="username" id="username" placeholder="Username..." required>
            <input class="registerInput" type="password" name="password" id="password" placeholder="Password..." required>
            <input class="registerInput registerButton" type="submit" name="submit" value="Register">
        </form>
    </main>
</body>
</html>