<?php

// Base Class
class pro {
	protected $x = 500;
	protected $y = 500;
			
	// Subtraction Function
	protected function sub() 
	{
		echo $sum=$this->x-$this->y . "<br/>";
	}	 
} 

// SubClass - Inherited Class
class child extends pro {


    function sub() {
		echo $sum=$this->x+$this->y . "<br/>";
        
    }

	function mul() //Multiply Function
	{
		echo $sub=$this->x*$this->y;
	}
} 

$obj= new child;
$obj->sub();
$obj->mul();
?>
