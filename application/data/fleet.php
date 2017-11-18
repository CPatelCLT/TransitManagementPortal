<?php
/**
 * Created by PhpStorm.
 * User: Chirag
 * Date: 11/17/2017
 * Time: 2:33 PM
 */

require_once('../database.php');

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

function getLastBus(){
    global $db;
    $stmt = $db->prepare('SELECT max(busID) FROM fleet');
    $stmt->execute();
    $bus = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bus;
}