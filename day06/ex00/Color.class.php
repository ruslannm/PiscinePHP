<?php
	class Color {
		public $red;
		public $green;
		public $blue;
		static $verbose = false;

		public function color_ctrl($color, $max_color){
			if ($color < 0)
				return 0;
			else if ($color > $max_color)
				return $max_color;
			return $color;
		}

		public function __construct(array $colors)
		{
			if (isset($colors['rgb'])) {
				$color = intval($colors['rgb'], 10);
				$color =$this->color_ctrl($color, 65535);
				$this->red = ($color >> 16) & 255;
				$this->green = ($color >> 8) & 255;
				$this->blue = $color & 255;
			} elseif (isset($colors['red'], $colors['green'], $colors['blue'])) {
				$this->red = $this->color_ctrl(intval($colors['red'], 10), 255);
				$this->green = $this->color_ctrl(intval($colors['green'], 10), 255);
				$this->blue = $this->color_ctrl(intval($colors['blue'], 10), 255);
			}
			if (self::$verbose){
				printf("Color( red: %3d, green: %3d, blue: %3d) constructed.\n",
					$this->red, $this->green, $this->blue);
			}
		}
		public function __destruct()
		{
			if (self::$verbose){
				printf("Color( red: %3d, green: %3d, blue: %3d) destructed.\n",
					$this->red, $this->green, $this->blue);
			}
		}
		public function __toString()
		{
			return (sprintf("Color( red: %3d, green: %3d, blue: %3d)",
							$this->red, $this->green, $this->blue));
		}

		public function doc(){
			if ($str = file_get_contents('Color.doc.txt')) {
				return $str;
			}
			else {
				return "Error: documentation file doesn't exist.\n";
			}
		}
		public function add($color){
			return (new Color(array('red' => ($this->red + $color->red) % 256,
				'green' => ($this->green + $color->green) % 256,
				'blue' => ($this->blue + $color->blue) % 256)));
		}
		public function sub($color){
			return (new Color(array('red' => ($this->red - $color->red) % 256,
				'green' => ($this->green - $color->green) % 256,
				'blue' => ($this->blue - $color->blue) % 256)));
		}
		public function mult($color){
			return (new Color(array('red' => ($this->red * $color->red) % 256,
				'green' => ($this->green * $color->green) % 256,
				'blue' => ($this->blue * $color->blue) % 256)));
		}

	}