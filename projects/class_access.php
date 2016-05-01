<?php
	class Car {
		public $wheels = 4;
		protected $hood = 1;
		private $engine = 1;
		var $doors = 4;

}
//create instance of class for use
$bmw = new Car();
$semi = new Semi();

$semi->showProperty();


class Semi extends Car {

function showProperty() {
			echo $this->hood;
		}
}
?>


