<?php
/**
 * Created by PhpStorm.
 * User: Chirag
 * Date: 11/17/2017
 * Time: 2:33 PM
 */

require_once('database.php');

function getAllPending() {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Maintenance WHERE employeeID IS NULL');
    $stmt->execute();
    $jobs = $stmt->fetchAll();
    $stmt->closeCursor();
    return $jobs;
}

function getAllActive($employeeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Maintenance where complete = "0" AND employeeID = :employeeID');
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->execute();
    $jobs = $stmt->fetchAll();
    $stmt->closeCursor();
    return $jobs;
}

function updateJob($maintID, $value, $type) {
    global $db;
    switch ($type) {
        case "claim":
        $stmt = $db->prepare("UPDATE Maintenance SET employeeID=:value WHERE maintenanceID=:maintID");
        $stmt->bindParam(':maintID', $maintID);
        $stmt->bindParam(':value', $value);
        break;
        case "complete":
            $stmt = $db->prepare("UPDATE Maintenance SET complete=:value WHERE maintenanceID=:maintID");
            $stmt->bindParam(':maintID', $maintID);
            $stmt->bindParam(':value', $value);
            break;
    }
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}
function addJob($busID, $desc) {
    global $db;
    $stmt = $db->prepare("INSERT INTO Maintenance (busID, maintItem,complete) VALUES (:busID, :desc ,0)");
    $stmt->bindParam(':busID', $busID);
    $stmt->bindParam(':desc', $desc);
    $stmt->execute();
    $stmt->closeCursor();
    return $db->lastInsertID();
}