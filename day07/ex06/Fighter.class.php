<?php
abstract class Fighter{
	private $_name;

	public function __construct($name){
			$this->_name = $name;
	}

	abstract function fight($target);

	public function __toString(){
		return $this->_name;
	}
}
?>