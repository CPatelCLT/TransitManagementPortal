<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 11/17/17
 * Time: 9:07 PM
 */

require_once('database.php');
function insertSchedule($employeeID, $busID, $routeID, $shiftstart, $shiftend)
{
    global $db;
    $stmt = $db->prepare("INSERT INTO Schedule (employeeID, busID, routeID, shiftstart, shiftend) VALUES (:employeeID, :busID, :routeID, :shiftstart, :shiftend)");
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->bindParam(':busID', $busID);
    $stmt->bindParam(':routeID', $routeID);
    $stmt->bindParam(':shiftstart', $shiftstart);
    $stmt->bindParam(':shiftend', $shiftend);
    $stmt->execute();
    $stmt->closeCursor();
    return $db->lastInsertID();
}

function getAllSchedule()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM Schedule');
    $stmt->execute();
    $schedule = $stmt->fetchAll();
    $stmt->closeCursor();
    return $schedule;
}

function getSchedulesByEmployee($employeeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Schedule where employeeID = :employeeID');
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->execute();
    $schedules = $stmt->fetchAll();
    $stmt->closeCursor();
    return $schedules;
}

function getCurrentEmpSchedule($employeeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Schedule where employeeID = :employeeID order by scheduleID desc');
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->execute();
    $schedule = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $schedule;
}
function getNextEmpSchedule($employeeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Schedule where employeeID = :employeeID order by scheduleID desc');
    $stmt->bindParam(':employeeID', $employeeID);
    $stmt->execute();
    $schedule = $stmt->fetchAll();
    $stmt->closeCursor();
    return $schedule[1];
}