<?php
require_once 'Color.class.php';
class Vertex{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static $verbose = false;

	public function __construct(array $vrtx)
	{
		if (isset($vrtx['x'], $vrtx['y'], $vrtx['z'])){
			$this->_x = $vrtx['x'];
			$this->_y = $vrtx['y'];
			$this->_z = $vrtx['z'];
		}
		if (isset($vrtx['w']))
			$this->_w = $vrtx['w'];
		else
			$this->_w = 1.0;
		if (isset($vrtx['color']))
			$this->_color = $vrtx['color'];
		else
			$this->_color = new Color(array('red'=>255, 'green'=>255, 'blue'=>255));
		if (self::$verbose){
			printf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s ) constructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		}
	}

	public function __destruct()
	{
		if (self::$verbose){
			printf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s ) destructed\n",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		}
	}

	public function __toString()
	{
		if (self::$verbose)
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s )",
				$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			return sprintf("Vertex( x: %.2f, y: %.2f, z: %.2f, w: %.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function doc(){
		if ($str = file_get_contents('Vertex.doc.txt')) {
			return $str;
		}
		else {
			return "Error: documentation file doesn't exist.\n";
		}
	}

	public function __get($name)
	{
		if (property_exists($this, $name))
			return $this->$name;
	}

	public function __set($name, $value)
	{
		if (property_exists($this, $name))
			$this->$name = $value;
	}

}