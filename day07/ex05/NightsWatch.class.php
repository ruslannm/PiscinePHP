<?php
	class NightsWatch implements iFighter{
		private $_fight;

		public function recruit($person){
			if ($person instanceof iFighter){
				$this->_fight = $this->_fight . $person->fight();
			}
		}

		public function fight(){
			print($this->_fight);
		}
	}
?>