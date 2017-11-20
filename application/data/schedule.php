<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 11/17/17
 * Time: 9:07 PM
 */

require_once('database.php');

function getAllSchedule()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM schedule');
    $stmt->execute();
    $schedule = $stmt->fetchAll();
    $stmt->closeCursor();
    return $schedule;
}

function getSchedulesByEmployee($employeeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM schedule where employeeID = :employeeID');
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->execute();
    $schedules = $stmt->fetchAll();
    $stmt->closeCursor();
    return $schedules;
}

function getCurrentEmpSchedule($employeeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM schedule where employeeID = :employeeID');
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->execute();
    $schedule = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $schedule;
}