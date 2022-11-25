<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../../backend/admin.php");
include("../../backend/patient.php");
if (!$_SESSION['currentUser']) {
    header("Location:./login.php?login");
}
if (isset($_POST['logout'])) {
    Admin::logout();
    header("Location: ./login.php");
}
if (isset($_POST['archive'])) {
    Patient::archivePatient($_POST['cin']);
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
                        <form method="post">
                            <button type="submit" class="logout-btn" name="logout">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="menu">
                    <p class="menu_title">Dashboard</p>
                    <div class="menu_elm">
                        <ul>
                            <a href="./dashboard.php">
                                <li class="active"><i class="fa-regular fa-folder"></i>Dossier</li>
                            </a>
                            <a href="./archive.php">
                                <li><i class="fa-solid fa-box-archive"></i>Archive</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard_body">
                <div>
                    <!--navigation-->
                    <div class="body_nav">
                        <div class="icons"></div>
                        <div class="title"> <span>Dashbord / </span> Dossier </div>
                    </div>
                    
                    <!--clients infos-->

                    <div class="info_table">
                        <div class="table_header">
                            <div class="add_btn">
                                    <a class="add_btn_pat" href="./addP.php" style="padding: .2rem;">Add patient</a>
                            </div>
                            <div class="search">
                                <input type="input" placeholder="search">
                            </div>
                            <!-- <div class="action">d</div> -->
                        </div>
                        <div class="table_body">
                            <div class="table_body_nav">
                                <div class="cin">cin</div>
                                <div class="fullname">nom complet</div>
                                <div class="sex">sex</div>
                                <div class="action">action</div>
                            </div>
                            <?php
                                $patients = Patient::getAllPatient();
                                foreach($patients as $patient) {
                                    echo "<div class='table_body_content'>
                                    <div class='table_body_info'>
                                        <div class='info_cin'><a href='./editP.php?cin=".$patient['cin']."'>".$patient['cin']."</a></div>
                                        <div class='info_fullname'>".$patient['nomComplet']."</div>
                                        <div class='info_sex'>".$patient['sexe']."</div>
                                        <div class='action_info'>
                                            <form method='post'>
                                                <input type='hidden' value=".$patient['cin']." name='cin'>
                                                <button class='traitement btn_dash'>traitement</button>
                                                <button class='btn_dash' type='submit' name='archive'><i class='fa-solid fa-box-archive'></i> &nbsp;Archive</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>