<?php
	class UnholyFactory{
		private $_types = array();

		public function absorb($type){
			if ($type instanceof Fighter){
				if (in_array($type, $this->_types)){
					print("(Factory already absorbed a fighter of type " . sprintf($type));
				}
				else {
					$this->_types[] = $type;
					print("(Factory absorbed a fighter of type " . sprintf($type));
				}
			}
			else {
				print("(Factory can't absorb this, it's not a fighter");
			}
			print(")" . PHP_EOL);
		}

		public function fabricate($type){
			$tmp = ucfirst(str_replace(' ', '', $type));
			foreach ($this->_types as $key => $value) {
				if (get_class($value) === $tmp)
				{
					$new = clone $this->_types[$key];
					print("(Factory fabricates a fighter of type " . $type . ")". PHP_EOL);
					return ($new);
				}
			}
			print("(Factory hasn't absorbed any fighter of type " . $type . ")" . PHP_EOL);
		}
	}
?>