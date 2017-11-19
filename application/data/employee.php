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