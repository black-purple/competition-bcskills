<?php
class Traitement {
    static public function connexion() {
        try {
            $servername = "localhost";
            $conn = new PDO("mysql:host=$servername;dbname=bcskills", "root", "");
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }

    static public function getTraitement($numTraitement) {
        Patient::connexion()->exec("SELECT * FROM traitement WHERE numTraitement='$numTraitement'");
    }
    
    static public function getPatientTraitements($numDossierPatient) {
        Patient::connexion()->exec("SELECT * FROM traitement WHERE numDossier='$numDossierPatient'");
    }

    static public function addTraitement($numDossier) {
        Patient::connexion()->exec("INSERT INTO traitement(nomMedecin, dateRencontre,detailsRencontre,conclusion,decision) WHERE numDossier='$numDossier'");
    }

}
