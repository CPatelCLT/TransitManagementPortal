<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 11/16/17
 * Time: 6:25 PM
 */

require_once('database.php');

function getAllEmployees()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM employees');
    $stmt->execute();
    $employees = $stmt->fetchAll();
    $stmt->closeCursor();
    return $employees;
}

function getEmployeesByRole($role) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM employees where role = :role');
    $stmt->bindParam(':role', $role);
    $stmt->execute();
    $employees = $stmt->fetchAll();
    $stmt->closeCursor();
    return $employees;
}

function getEmployeeByID($empID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM employees where employeeID = :empID');
    $stmt->bindParam(':empID', $empID);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $employee;
}

function getEmployeeByUsername($username) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM employees where username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $employee;
}

function doEmployeeLogin($username, $password) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM employees where username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    if($employee['password'] != $password) {
        return false;
    } else {
        return $employee;
    }
}
function updateEmployee($id, $username, $password, $email, $role, $firstname, $lastname) {
    global $db;
    $stmt = $db->prepare("UPDATE employees SET username=:username, password=:password, firstname=:firstname, lastname=:lastname, role=:role, email=:email WHERE employeeID=:employeeID");
    $stmt->bindParam(':employeeID', $id);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $email);
    $stmt->bindParam(':lastname', $role);
    $stmt->bindParam(':role', $firstname);
    $stmt->bindParam(':email', $lastname);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}
function insertEmployee($username, $password, $email, $role, $firstname, $lastname) {
    global $db;
    $stmt = $db->prepare("INSERT INTO employees (username, password, firstname, lastname, role, email) VALUES (:username, :password, :firstname, :lastname, :role, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $email);
    $stmt->bindParam(':lastname', $role);
    $stmt->bindParam(':role', $firstname);
    $stmt->bindParam(':email', $lastname);
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