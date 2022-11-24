<!DOCTYPE html>
<html lang="en">
<?php
    include("../../backend/admin.php"); 
    if(isset($_POST['login'])) {
        Admin::login($_POST['email'], $_POST['passwd']);
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Login &bull; Healthcare</title>
</head>

<body>

    <div class="login_container">
        <!--logo et brand-->
        <div class="title">
            <div class="logo">
                <img src="../assets/logo.png" alt="">
            </div>
            <div class="brand">healthcare</div>
        </div>
        <!--welcome-->
        <div class="msg">
            Merci d'entrer vos informations
        </div>

        <!-- form-->
        <div class="form_container">
            <form method="post">
                <!--email-->
                <div class="item">
                    <label for="">email</label> <br>
                    <input type="email" name="email">
                </div>
                <!--mot de passe-->
                <div class="item">
                    <label for="">mot de passe</label> <br>
                    <input type="password" name="passwd">
                </div>
                <!--submit-->
                <button class="btn_connect" name="login">se connecter</button>
            </form>
        </div>
    </div>


</body>

</html>