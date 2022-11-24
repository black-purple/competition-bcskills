<?php
class Patient {
    static public function connexion() {
        try {
            $servername = "localhost";
            $conn = new PDO("mysql:host=$servername;dbname=bcskills", "root", "");
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }

    static public function getPatient($numDossier) {
        
        Patient::connexion()->exec("SELECT * FROM patient WHERE numDossier='$numDossier'");
    }
    
    static public function getAllPatient() {
        
        Patient::connexion()->exec("SELECT * FROM patient");
    }

    static public function addPatient($cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes) {
        Patient::connexion()->exec("INSERT INTO patient()");
    }

    static public function editPatient($cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes){
        Patient::connexion()->exec("UPDATE patient SET numDossier='$numDossier', cin='$cin', nomComplet='$nomComplet', dateNaissance='$dateNaissance', sexe='$sexe', profession='$profession', tel='$tel', adresse='$adresse', numSecSociale='$numSecSociale', mutuelle='$mutuelle', payeurs='$payeurs', dAlertes='$dAlertes'");
    }

    static public function archivePatient($numDossier) {
        Patient::connexion()->exec("UPDATE patient SET archive='1' WHERE numDossier='$numDossier'");
    }

}