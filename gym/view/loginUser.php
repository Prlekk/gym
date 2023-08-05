<?php 
    session_start();
    include_once '../model/User.php';
    if(isset($_POST['submit']))
    {
        $u = new User();

        $username = escapeshellcmd(htmlspecialchars($_POST['username']));
        $password = escapeshellcmd(htmlspecialchars($_POST['password']));

        if($u->loginUser($username, $password))
        {
            $user = $u->getUser($username);
            $_SESSION['id_user']['id_user'] = $user->getIdUser();
            $_SESSION['name']['name'] = $user->getName();
            $_SESSION['email']['email'] = $user->getEmail();
            $_SESSION['username']['username'] = $user->getUsername();
            $_SESSION['password']['password'] = $user->getPassword();
            header("Location:dashboard.php");
        }
        else {
            echo "error";
        }
    }
    include_once 'head.php';
?>
<body>
    <div class="registerDiv">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" class="registerForm" method="post">
            <h1 class="registerTitle">Login</h1>
            <input class="registerInput" type="text" name="username" id="username" placeholder="Username...">
            <input class="registerInput" type="password" name="password" id="password" placeholder="Password...">
            <input class="registerInput registerButton" type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>