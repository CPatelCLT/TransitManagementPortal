<?php
/**
 * Created by PhpStorm.
 * User: Chirag
 * Date: 11/17/2017
 * Time: 2:39 PM
 */

require_once('database.php');

function getAllRoutes()
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM Routes');
    $stmt->execute();
    $routes = $stmt->fetchAll();
    $stmt->closeCursor();
    return $routes;
}

function getRouteByID($routeID) {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Routes where routeID = :routeID');
    $stmt->bindParam(':routeID', $routeID);
    $stmt->execute();
    $route = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $route;
}

function getRouteSequence($routeID) {
    global $db;
    $stmt = $db->prepare('select RouteSequence.*, Stops.* from RouteSequence inner join Stops on RouteSequence.stopID = Stops.stopID where routeID = :routeID;');
    $stmt->bindParam(':routeID', $routeID);
    $stmt->execute();
    $routeSequence = $stmt->fetchAll();
    $stmt->closeCursor();
    return $routeSequence;
}

function getAllStops() {
    global $db;
    $stmt = $db->prepare('SELECT * FROM Stops');
    $stmt->execute();
    $stops = $stmt->fetchAll();
    $stmt->closeCursor();
    return $stops;
}