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

    static public function addPatient($numDossier, $cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes) {
        Patient::connexion()->exec("INSERT INTO patient()");
    }

    static public function editPatient($numDossier, $cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes){
        Patient::connexion()->exec("UPDATE patient SET ");
    }

    static public function archivePatient($numDossier) {
        
    }
}