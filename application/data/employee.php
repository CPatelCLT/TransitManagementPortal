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
    $stmt = $db->prepare('SELECT * FROM Employees');
    $stmt->execute();
    $employees = $stmt->fetchAll();
    $stmt->closeCursor();
    return $employees;
}

function getEmployeesByRole($role) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Employees where role = :role');
    $stmt->bindParam(':role', $role);
    $stmt->execute();
    $employees = $stmt->fetchAll();
    $stmt->closeCursor();
    return $employees;
}

function getEmployeeByID($empID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Employees where employeeID = :empID');
    $stmt->bindParam(':empID', $empID);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $employee;
}

function getEmployeeByUsername($username) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Employees where username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $employee;
}

function doEmployeeLogin($username, $password) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Employees where username = :username');
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
    // TODO Check for role difference, call promoteEmployee() after update if there is a difference
    global $db;
    $stmt = $db->prepare("UPDATE Employees SET username=:username, password=:password, firstname=:firstname, lastname=:lastname, role=:role, email=:email WHERE employeeID=:employeeID");
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
    $stmt = $db->prepare("INSERT INTO Employees (username, password, firstname, lastname, role, email) VALUES (:username, :password, :firstname, :lastname, :role, :email)");
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
    $stmt = $db->prepare('DELETE FROM Employees where employeeID = :employeeID');
    $stmt->bindParam(':employeeID', $id);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt->rowCount();
}

function promoteEmployee($employeeID, $prevRole, $newRole) {
    // TODO Promote method will remove references in tables that rely on the employee being a certain role
    // Example: A driver being promoted to an administrator cannot have entries in the schedule table
}