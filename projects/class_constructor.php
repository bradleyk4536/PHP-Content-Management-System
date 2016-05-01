<?php
	class Car {
		var $wheels = 4;
		var $hood = 1;
		var $engine = 1;
		var $doors = 4;
		//RUNS AUTOMATICALLY UPON CREATION
		function __construct() {
			echo $this->wheels = 10;
		}
		function CreateDoors(){

			$this->doors = 6;
		}
	}

$bmw = new Car();
$truck = new Car();
$max = new Car();



