<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 11/16/17
 * Time: 6:25 PM
 */

require_once('database.php');

function getAllCustomers()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM customers');
    $stmt->execute();
    $employees = $stmt->fetchAll();
    $stmt->closeCursor();
    return $employees;
}

function getCustomerByID($custID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM customers where userID = :ID');
    $stmt->bindParam(':ID', $custID);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $employee;
}

function getCustomerByUsername($username) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM customers where username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $employee;
}

function doCustomerLogin($username, $password) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM customers where username = :username');
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
function updateCustomer($id, $username, $password, $email, $role, $firstname, $lastname) {
    // TODO Implement update function
}
function insertCustomer($username, $password, $email, $role, $firstname, $lastname) {
    // TODO Implement insert function
}
function deleteCustomer($id){
    // TODO Implement delete function
}