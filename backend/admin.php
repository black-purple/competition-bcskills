<?php
class Admin {
    static public function db() {
        try {
            $servername = "localhost";
            $conn = new PDO("mysql:host=$servername;dbname=bcskills", "root", "");
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }

    static public function login($email, $mdp){
        $sql = "SELECT * FROM administrateur WHERE email='$email' AND mdp='$mdp'";
        $response = Admin::db()->query($sql);
        if ($response->rowCount() > 0){
            $data =  $response->fetch();
            $_SESSION['currentUser']['email'] = $data['email'];
            header("Location:./dashboard.html");
        }else{
            echo "<script>alert('verifier votre mail ou mot de passe');</script>";
        }
    }

    static public function logout() {
        session_abort();
        session_reset();
        session_destroy();
    }
}
?>