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
if (isset($_POST['editp'])) {
    Patient::editPatient($_POST['cin'], $_POST['nom'], $_POST['daten'], $_POST['sexe'], $_POST['profession'], $_POST['tel'], $_POST['adresse'], $_POST['secsoc'], $_POST['payeurs'],  $_POST['mutuelle'], $_POST['alertes']);
    header("Location: ./dashboard.php");
}
if (isset($_GET['cin'])) {
    $patient = Patient::getPatient($_GET['cin']);
    var_dump($patient);
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/update.css">
    <script src="https://kit.fontawesome.com/8579b38148.js" crossorigin="anonymous"></script>
    <title> Healthcare &bull; Ajouter</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
</head>

<body>
<div class="wrapper_all">
        <class class="wrapper">
            <div class="sidebar">
                <div class="profile">
                    <div class="profile_imgname">
                        <div class="profile_img"></div>
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
                        <div class="title"> <span>Dashbords / </span> Default </div>
                    </div>
                </div>

                <div class="forms">
                    <form method="post">
                        <!--identification-->
                        <div class="form_container">
                            <div class="form_title">identification : </div>
                                <div class="row">
                                    <div class="item">
                                        <label for="">nom complet</label><br>
                                        <input type="text" name="nom" value="<?php echo $patient['nomComplet'];?>">
                                    </div>
                                    <div class="item">

                                        <label for="">sexe</label> <br>
                                        <select name="sexe" id="">
                                            <option value="H">Homme</option>
                                            <option value="F">Femme</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="item">
                                        <label for="">date de naissance</label> <br>
                                        <input type="date" name="daten" value="<?php echo $patient['dateNaissance'];?>">
                                    </div>
                                </div>
                        </div>
                            <!--informations administratives-->
                        <div class="form_container">
                            <div class="form_title">informations : </div>
                            <div class="form">
                                <div class="row">
                                    <div class="item">
                                        <label for="">adresse</label> <br>
                                        <input type="text" name="adresse" value="<?php echo $patient['adresse'];?>">
                                    </div>
                                    <div class="item">

                                        <label for="">téléphone</label> <br>
                                        <input type="text" name="tel" value="<?php echo $patient['tel'];?>">
                                    </div>

                                <div class="item">
                                <label for="">payeurs</label> <br>
                                <input type="num" name="payeurs" value="<?php echo $patient['payeurs'];?>">
                            </div> 
                            </div>

                                <div class="row">
                                    <div class="item">
                                        <label for="">proffesion</label> <br>
                                        <input type="text" name="profession" value="<?php echo $patient['profession'];?>">
                                    </div>
                                    <div class="item">
                                        <label for="">numéro de sécurité sociale</label> <br>
                                        <input type="text" name="secsoc" value="<?php echo $patient['numSecSociale'];?>">
                                    </div>
                                    <div class="item">
                                        <label for="">mutuelle</label> <br>
                                        <select name="mutuelle" id="">
                                            <option value="mutuelle" selected>
                                                mutuelle
                                            </option>
                                            <option value="ATLANTIC">ATLANTIC</option>
                                            <option value="SMONO">SMONO</option>
                                            <option value="AMO">AMO</option>
                                            <option value="CNSS">CNSS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item">
                                        <label for="">données d'alertes</label> <br>
                                        <input type="text" name="alertes" value="<?php echo $patient['dAlertes'];?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--traitments-->
                        <!-- <div class="form_container">
                            <div class="form_title">traitements : </div>
                            <div class="form">
                                <div class="row">
                                    <div class="item">
                                        <label for="">nom de médecin</label> <br>
                                        <input type="text">
                                    </div>
                                    <div class="item">

                                <label for="">date de la rencotre</label> <br>
                                <input type="date">
                                </div>

                                    <div class="item">
                                        <label for="">donées significatives de la rencotre</label> <br>
                                        <input type="text">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="item">
                                        <label for="">synthése de la rencotre</label> <br>
                                        <input type="text">
                                    </div>
                                    <div class="item">
                                        <label for="">décisions</label> <br>
                                        <input type="text">
                                    </div>
                                </div>

                            </div>
                        </div> -->
                        <!--end of forms-->        
                        <button class="btn_update" name="editp" type="submit"> Edit Patient </button>
                    </form>
                </div>

                <!--submit button-->
            </div>
        </class>
    </div>
</body>

</html>