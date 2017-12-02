<?php
/**
 * Created by PhpStorm.
 * User: Chirag
 * Date: 11/17/2017
 * Time: 2:33 PM
 */

require_once('database.php');

function getAllBuses()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM fleet');
    $stmt->execute();
    $buses = $stmt->fetchAll();
    $stmt->closeCursor();
    return $buses;
}

function getBusesByActive($active) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM fleet where active = :active');
    $stmt->bindParam(':active', $active);
    $stmt->execute();
    $buses = $stmt->fetchAll();
    $stmt->closeCursor();
    return $buses;
}

function getBusByID($busID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM fleet where busID = :busID');
    $stmt->bindParam(':busID', $busID);
    $stmt->execute();
    $bus = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bus;
}

function getNextBus(){
    global $db;
    $stmt = $db->prepare('SHOW TABLE STATUS LIKE "fleet"');
    $stmt->execute();
    $bus = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bus['Auto_increment'];
}

function updateBus($busID, $mileage) {
    global $db;
    $stmt = $db->prepare("UPDATE fleet SET mileage=:mileage WHERE busID=:busID");
    $stmt->bindParam(':busID', $busID);
    $stmt->bindParam(':mileage', $mileage);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}
function insertBus($mileage) {
    global $db;
    $stmt = $db->prepare("INSERT INTO fleet (active, mileage) VALUES ('1', :mileage)");
    $stmt->bindParam(':mileage', $mileage);
    $stmt->execute();
    $stmt->closeCursor();
    return $db->lastInsertID();
}
function deleteBus($busID){
    global $db;
    $stmt = $db->prepare('DELETE FROM fleet where busID = :busID');
    $stmt->bindParam(':busID', $busID);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}