<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 11/16/17
 * Time: 6:25 PM
 */

require_once('../database.php');

function getEmployees()
{
    global $db;
    $queryAllEmployees = 'SELECT * FROM employees';
    $stmt = $db->prepare('SELECT * FROM employees');
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
    $employee = $stmt->fetch();
    $stmt->closeCursor();
    return $employee;
}
function getEmployeeByUsername($empID) {

}