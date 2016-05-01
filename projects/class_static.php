<?php
	class Car {
		static $wheels = 4;
		var $hood = 1;

		function moveWheels() {
		Car::$wheels = 10;
		}

	}

//create instance of class for use

$bmw = new Car();
//USE STATIC AS FOLLOWING
Car::moveWheels();
echo Car::$wheels;
?>


