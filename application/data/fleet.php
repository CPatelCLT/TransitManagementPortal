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

function getLastBus(){
    global $db;
    $stmt = $db->prepare('SELECT max(busID) as last FROM fleet');
    $stmt->execute();
    $bus = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bus['last']+1;
}
function getNextBus(){
    global $db;
    $stmt = $db->prepare('SHOW TABLE STATUS LIKE "fleet"');
    $stmt->execute();
    $bus = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $bus['Auto_increment'];
}


function updateEmployee($id, $username, $password, $email, $role, $firstname, $lastname) {
    global $db;
    $stmt = $db->prepare("UPDATE employees SET username=:username, password=:password, firstname=:firstname, lastname=:lastname, role=:role, email=:email WHERE employeeID=:employeeID");
    $stmt->bindParam(':employeeID', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}
function insertEmployee($username, $password, $email, $role, $firstname, $lastname) {
    global $db;
    $stmt = $db->prepare("INSERT INTO employees (username, password, firstname, lastname, role, email) VALUES (:username, :password, :firstname, :lastname, :role, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stmt->closeCursor();
    return $db->lastInsertID();
}
function deleteEmployee($id){
    global $db;
    $stmt = $db->prepare('DELETE FROM employees where employeeID = :employeeID');
    $stmt->bindParam(':employeeID', $id);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}