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

    static public function getPatient($cin) {
        $patient = Patient::db()->query("SELECT * FROM patient WHERE cin='$cin'");
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

    static public function addPatient($cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes) {
        $sql = "INSERT INTO patient(cin, nomComplet, dateNaissance, sexe, profession, tel, adresse, numSecSociale, payeurs, mutuelle, dAlertes) VALUES('$cin', '$nomComplet', '$dateNaissance', '$sexe', '$profession',' $tel', '$adresse', '$numSecSociale', '$payeurs', '$mutuelle', '$dAlertes')";
        Patient::db()->exec($sql);
    }

    static public function editPatient($cin, $nomComplet, $dateNaissance, $sexe, $profession, $tel, $adresse, $numSecSociale,$payeurs,$mutuelle, $dAlertes){
        Patient::db()->exec("UPDATE patient SET nomComplet='$nomComplet', dateNaissance='$dateNaissance', sexe='$sexe', profession='$profession', tel='$tel', adresse='$adresse', numSecSociale='$numSecSociale', mutuelle='$mutuelle', payeurs='$payeurs', dAlertes='$dAlertes' WHERE cin='$cin'");
    }

    static public function archivePatient($cin) {
        Patient::db()->exec("UPDATE patient SET archive='1' WHERE cin='$cin'");
    }

}