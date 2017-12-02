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
    $stmt = $db->prepare('SELECT * FROM Customers');
    $stmt->execute();
    $customers = $stmt->fetchAll();
    $stmt->closeCursor();
    return $customers;
}

function getCustomerByID($custID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Customers where userID = :ID');
    $stmt->bindParam(':ID', $custID);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $customer;
}

function getCustomerByUsername($username) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Customers where username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $customer;
}

function doCustomerLogin($username, $password) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Customers where username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    if($customer['password'] != $password) {
        return false;
    } else {
        return $customer;
    }
}

function getCustomerFavorites($userID) {
    global $db;
    $stmt = $db->prepare('select Routes.* from CustomerFavorites inner join Routes on CustomerFavorites.routeID = Routes.routeID where userID = :userID;');
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    $custFavs = $stmt->fetchAll();
    $stmt->closeCursor();
    return $custFavs;
}
function updateCustomer($id, $username, $password, $email) {
    // TODO Implement update function
}
function insertCustomer($username, $password, $email) {
    // TODO Implement insert function
}
function deleteCustomer($id){
    // TODO Implement delete function
}