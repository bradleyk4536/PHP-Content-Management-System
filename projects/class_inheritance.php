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
//create instance of class for use
$bmw = new Car();
class Plane extends Car {
	var $wheels = 20;
}
$jet = new Plane();
//$jet->moveWheels();
echo $jet->wheels;
?>


