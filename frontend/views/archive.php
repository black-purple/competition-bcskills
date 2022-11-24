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
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <script src="https://kit.fontawesome.com/8579b38148.js" crossorigin="anonymous"></script>
    <title>Archive &bull; Healthcare</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="wrapper_all">
        <div class="wrapper">
            <div class="sidebar">
                <div class="profile">
                    <div class="profile_imgname">
                        <div class="profile_img"></div>
                        <p><?php echo $_SESSION['currentUser']['email']; ?></p>
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
                                <li><i class="fa-regular fa-folder"></i>Dossier</li>
                            </a>
                            <a href="./archive.php">
                                <li class="active"><i class="fa-solid fa-box-archive"></i>Archive</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dashboard_body">
                <div class="dashboard_body_nav">
                    <div class="body_nav">
                        <div class="icons"></div>
                        <div class="title"> <span>Dashbord / </span> Dossier </div>
                    </div>
                </div>
                <div class="body_wrapper">
                    <div class="dashboard_body_body">
                        <!--clients infos-->
                        <div class="info_table">
                            <table>

                                <thead>
                                    <tr>
                                    <th scope="col">CIN</th>
                                        <th scope="col">NOM COMPLET</th>
                                        <th scope="col">SEXE</th>
                                    </tr>
                                    <tr class="border-bottom"></tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $patients = Patient::getAllPatient(true);
                                        foreach($patients as $patient) {
                                            echo "<tr>
                                                <td>".$patient['cin']."</td>
                                                <td>".$patient['nomComplet']."</td>
                                                <td>".$patient['sexe']."</td>
                                            </tr>";                                            
                                        }
                                    ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>