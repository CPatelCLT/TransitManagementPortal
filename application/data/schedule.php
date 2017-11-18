<?php
/**
 * Created by PhpStorm.
 * User: chirag
 * Date: 11/17/17
 * Time: 9:07 PM
 */

require_once('../database.php');

function getAllSchedule()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM schedule');
    $stmt->execute();
    $schedule = $stmt->fetchAll();
    $stmt->closeCursor();
    return $schedule;
}