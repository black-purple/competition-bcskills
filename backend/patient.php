<?php
class Patient {
    static public function db() {
        try {
            $servername = "localhost";
            $conn = new PDO("mysql:host=$servername;dbname=bcskills", "root", "");
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }

    static public function getPatient($numDossier) {
        $patient = Patient::db()->query("SELECT * FROM patient WHERE numDossier='$numDossier'");
        return $patient;
    }
    
    static public function getAllPatient($archived=false) {
        if ($archived) {
            $patients = Patient::db()->query("SELECT * FROM patient WHERE archive='1'");
        } else {
            $patients = Patient::db()->query("SELECT * FROM patient WHERE archive='0'");
        }
        return $patients;
    }

    static public function addPatient($numDossier, $cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes) {
        Patient::db()->exec("INSERT INTO patient(numDossier, cin, nomComplet, dateNaissance, sexe, profession, tel, adresse, numSecSociale,payeurs,mutuelle, dAlertes)VALUES($numDossier, $cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes)");
    }

    static public function editPatient($numDossier, $cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes){
        Patient::db()->exec("UPDATE patient SET numDossier='$numDossier', cin='$cin', nomComplet='$nomComplet', dateNaissance='$dateNaissance', sexe='$sexe', profession='$profession', tel='$tel', adresse='$adresse', numSecSociale='$numSecSociale', mutuelle='$mutuelle', payeurs='$payeurs', dAlertes='$dAlertes'");
    }

    static public function archivePatient($numDossier) {
        Patient::db()->exec("UPDATE patient SET archive='1' WHERE numDossier='$numDossier'");
    }

}