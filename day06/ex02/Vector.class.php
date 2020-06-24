<?php
	require_once 'Color.class.php';
	require_once 'Vertex.class.php';

	class Vector{
		private $_x;
		private $_y;
		private $_z;
		private $_w = 0.0;
		static $verbose = false;

		public function __construct(array $vector)
		{
			if (array_key_exists('orig', $vector)){
				$orig = new Vertex(array(
					'x' => $vector['orig']->_x,
					'y' => $vector['orig']->_y,
					'z' => $vector['orig']->_z));
			}
			else {
				$orig = new Vertex(array(
					'x' => 0.0,	'y' => 0.0,	'z' => 0.0, 'w' => 1.0));
			}
			if (array_key_exists('dest', $vector)){
				$this->_x = $vector['dest']->_x - $orig->x;
				$this->_y = $vector['dest']->_y - $orig->y;
				$this->_z = $vector['dest']->_z - $orig->z;
			}
			if (self::$verbose) {
				printf("%s  constructed\n", $this);
			}
		}
		public function __destruct()
		{
			if (self::$verbose) {
				printf("%s destructed\n", $this);
			}
		}

		public function __toString()
		{
			if (Vertex::$verbose)
				return sprintf("Vector( x: %.2f, y: %.2f, z: %.2f, w: %.2f, %s )",
					$this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
			else
				return sprintf("Vector( x: %.2f, y: %.2f, z: %.2f, w: %.2f )",
					$this->_x, $this->_y, $this->_z, $this->_w);
		}

		public function doc(){
			if ($str = file_get_contents('Vector.doc.txt')) {
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

		public function magnitude() {
			$magnitude = (float)sqrt($this->_y ** 2 + $this->_y ** 2 + $this->_z ** 2);
			if (1 == $magnitude)
				return "norm";
			else
				return $magnitude;
		}

		public function normalize(){
			$length = $this->magnitude();
			if (1 == $length){
				return clone $this;
			}
			return new Vector(array('dest'=> new Vertex(array('x'=> $this->_x / $length,
				'y'=> $this->_y / $length,'z'=> $this->_z / $length))));
		}

		public function add(Vector $rhs){
			return new Vector(array('dest'=> new Vertex(array('x'=> $this->_x + $rhs->_x,
				'y'=> $this->_y + $rhs->_y,'z'=> $this->_z + $rhs->_z))));
		}

		public function sub(Vector $rhs){
			return new Vector(array('dest'=> new Vertex(array('x'=> $this->_x - $rhs->_x,
				'y'=> $this->_y - $rhs->_y,'z'=> $this->_z - $rhs->_z))));
		}

		public function opposite(){
			return new Vector(array('dest'=> new Vertex(array('x'=> $this->_x * (-1),
				'y'=> $this->_y * (-1),'z'=> $this->_z * (-1)))));
		}

		public function scalarProduct($k){
			return new Vector(array('dest'=> new Vertex(array('x'=> $this->_x * $k,
				'y'=> $this->_y * $k,'z'=> $this->_z * $k))));
		}

		public function dotProduct(Vector $rhs){
			return (float)($this->_x * $rhs->_x +
				 $this->_y * $rhs->_y + $this->_z * $rhs->_z);
		}

		public function cos(Vector $rhs){
			if ($this->magnitude() == "norm")
				$mult_length = 1;
			else
				$mult_length = $this->magnitude();
			if ($rhs->magnitude() != "norm")
				$mult_length = $mult_length * $rhs->magnitude();
			return (float)($this->dotProduct($rhs) / $mult_length);
		}

		public function crossProduct(Vector $rhs){
			return new Vector(array('dest' => new Vertex(array(
				'x' => $this->_y * $rhs->_z - $this->_z * $rhs->_y,
				'y' => $this->_z * $rhs->_x - $this->_x * $rhs->_z,
				'z' => $this->_x * $rhs->_y - $this->_y * $rhs->_x))));
		}
	}