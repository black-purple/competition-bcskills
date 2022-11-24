<?php
class Traitement {
    static public function db() {
        try {
            $servername = "localhost";
            $conn = new PDO("mysql:host=$servername;dbname=bcskills", "root", "");
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }

    static public function getTraitement($numTraitement) {
        $traitement = Patient::db()->query("SELECT * FROM traitement WHERE numTraitement='$numTraitement'");
        if ($traitement->rowCount() > 0) {
            return $traitement;
        }
        return false;
        // TODO: liste
    }
    
    static public function getPatientTraitements($numDossierPatient) {
        $traits = Patient::db()->query("SELECT * FROM traitement WHERE numDossier='$numDossierPatient'");
        if ($traits->rowCount() > 1) {

        }
        return $traits;
    }

    static public function addTraitement($numDossier) {
        Patient::db()->exec("INSERT INTO traitement(nomMedecin, dateRencontre,detailsRencontre,conclusion,decision) WHERE numDossier='$numDossier'");
    }

}
