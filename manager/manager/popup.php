<?php

include_once "../config/databaseConf.php";

$eventModel = new eventModel("root","");

$data = json_decode(file_get_contents("php://input"),true);

header('Content-Type: application/json; charset=utf-8');

$eventCategories = $eventModel->getEventCategories(true);

$event = $eventModel->getEvent($data['id']);

$event['categoryIcon'] = $eventModel->getEventCategoryIcons()[$event['category']];
$event['category'] = $eventCategories[$event['category']];


echo (json_encode($event));

?>