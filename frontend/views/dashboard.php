<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if (!$_SESSION['currentUser']) {
        header("Location:./login.php?login");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <script src="https://kit.fontawesome.com/8579b38148.js" crossorigin="anonymous"></script>
    <title>Dashboard &bull; Healthcare</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="wrapper_all">
        <div class="wrapper">
            <div class="sidebar">
                <div class="profile">
                    <div class="profile_imgname">
                        <div class="profile_img"></div>
                        <p><?php echo $_SESSION['currentUser']['email']?></p>
                    </div>
                    <div class="logout">
                        <form method="post"></form>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
                </div>
                <div class="menu">
                    <p class="menu_title">Dashboard</p>
                    <div class="menu_elm">
                        <ul>
                            <li>Dossier</li>
                            <li>Archive</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard_body">
                <div>body</div>
            </div>              
        </div>
    </div>

</body>
</html>