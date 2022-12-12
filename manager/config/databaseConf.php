<?php

class eventModel {

        private $conn;
        private $serverName = "localhost";
        private $dbname ="test";
        private $userName;
        private $password;


        public function __construct($user,$pwd) {
            $this->userName = $user;
            $this->password = $pwd;

            try {
                $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbname", $this->userName, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                echo "Connected successfully";
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }

        public function getEventCategoryNames() {
            $names = [];
            $eventCategories = $this->getEventCategories();
            foreach($eventCategories as $eventCategory) {
                $names[$eventCategory['eventCategoryID']] = $eventCategory['name'];
            }
            return $names;
        }

        public function getEventCategories() {
            $eventCategoryReceiveStatement = $this->conn->prepare("SELECT * FROM eventcategory");
            $eventCategoryReceiveStatement->execute();
            $eventCategoryReceiveStatement->setFetchMode(PDO::FETCH_ASSOC);
            return $eventCategoryReceiveStatement->fetchAll();
        }

        public function createEvent($data) {
            if(!$this->validate($data)) {
                return "validation failed";
            }

            try {
                $eventId = uniqid("event",true);
                $eventCreateStatement = $this->conn->prepare("INSERT INTO event (eventID, category, theme, contact, date, time, location, description) VALUES (:eventID, :category, :theme, :contact, :date, :time, :location, :description)");
                $eventCreateStatement->bindParam(':eventID', $eventId);
                $eventCreateStatement->bindParam(':category', $data['eventCategory']);
                $eventCreateStatement->bindParam(':theme', $data['eventTheme']);
                $eventCreateStatement->bindParam(':contact', $data['eventContact']);
                $eventCreateStatement->bindParam(':date', $data['eventDate']);
                $eventCreateStatement->bindParam(':time', $data['eventTime']);
                $eventCreateStatement->bindParam(':location', $data['eventLocation']);
                $eventCreateStatement->bindParam(':description', $data['eventDescription']);
                $eventCreateStatement->execute();
                return "Created Successfully!!";
            } catch(PDOException $e) {
                return "Creation failed: " . $e->getMessage();
            }

        }

        public function validate($data) {
            if(empty($data['eventCategory']) || empty($data['eventTheme']) || empty($data['eventDescription']) || empty($data['eventLocation']) || empty($data['eventDate']) || empty($data['eventTime']) || empty($data['eventContact']) ) {
                return false;
            }
            return true;
        }

        public function displayEvents() {
            $events = $this->getEvents();
            $eventCategoryIcons = $this->getEventCategoryIcons();
            foreach($events as $event) {
                echo "<div class='eventCard'>";
                echo "<div >";
                echo "<div>";
                echo "<img src=${eventCategoryIcons[$event['category']]} alt='Blood'>";
                echo "</div>";
                echo "<div>";
                echo "<img src='./../src/eventIcons/participants.svg' alt='participants'>";
                echo "<p>${event['participationCount']}</p>";
                echo "</div>";
                echo "</div>";
                echo "<div>";
                echo "<h2>${event['theme']}</h2>";
                echo "</div>";
                echo "<div>";
                echo "<div>";
                echo "<img src='./../src/eventIcons/location.svg' alt='location'>";
                echo "<p>${event['location']}</p>";
                echo "</div>";
                echo "<div>";
                echo "<p>${event['date']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

            }
        }

        public function getEvents() {
            $eventReceiveStatement = $this->conn->prepare("SELECT * FROM event");
            $eventReceiveStatement->execute();
            $eventReceiveStatement->setFetchMode(PDO::FETCH_ASSOC);
            return $eventReceiveStatement->fetchAll();
        }

        public function getEventCategoryIcons() {
            $icons = [];
            $eventCategories = $this->getEventCategories();
            foreach($eventCategories as $eventCategory) {
                $icons[$eventCategory['eventCategoryID']] = "./../src/eventIcons/event/${eventCategory['icon']}.svg";
            }
            return $icons;
        }
}

