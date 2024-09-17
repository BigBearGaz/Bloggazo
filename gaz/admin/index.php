<?php
session_start();

require_once('functions.php');

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST['password'];
    
    if (!empty($username) && !empty($password)) {
        $db = db_connect();

        $sql = "SELECT * FROM admins WHERE name = :name";
        $req = $db->prepare($sql);
        $req->bindParam(':name', $username);
        $req->execute();
        
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            // Stockez les données correctes dans la session
            $_SESSION["name"] = $user['name'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["token"] = $user['token'];
            $_SESSION["role"] = $user['role'];
            header("Location: home.php");
            exit();
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect";
        }
    } else {
        echo "Pas d'username ou de mot de passe";
    }
}
?>
<form action="index.php" method="post">
    <input type="text" name="username" placeholder="nom">
    <input type="password" name="password" placeholder="mot de passe">
    <input type="submit" name="login" value="connexion" />
</form>
