<?php
    session_start();
    if (isset($_POST['username']) && isset($_POST['password'])) {
        include '../../db.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT id, usuario FROM admin WHERE usuario LIKE '$username' and senha LIKE '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['admin'] = true;
            setcookie('admin_username', $row['usuario']);
            header('Location: index.php');
            //echo "Login correto";
        } else {
            echo "Login incorreto";
        }
    }
?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <form method="POST" action="login.php">
            <input type="text" name="username" value="admin"/>
            <input type="password" name="password" />
            <input type="submit" value="Entrar" />
        </form>
    </body>
</html>