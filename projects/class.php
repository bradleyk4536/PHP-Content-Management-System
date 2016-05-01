<?php
	class Car {
		var $wheels = 4;
		var $hood = 1;
		var $engine = 1;
		var $doors = 4;
		function moveWheels() {
			$this->wheels = 10;
		}
		function CreateDoors(){
			$this->doors = 6;
		}
	}
//Test to see if class exists
if(class_exists("Car")) {
	echo "Yes class exists" . "<br>";
} else {
	echo "No class does not exist" . "<br>";
}
//test to see if method exists
if(method_exists("Car", "moveWheels")) {
	echo "Yes method exists" . "<br>";
} else {
	echo "No method does not exist" . "<br>";
}
//create instance of class for use
$bmw = new Car();
$truck = new Car();
//$bmw->moveWheels();
//use properties of class
//$bmw->wheels = 8;
$truck->doors = 66;
echo $bmw->wheels . "<br>";
echo $truck->doors;
?>


