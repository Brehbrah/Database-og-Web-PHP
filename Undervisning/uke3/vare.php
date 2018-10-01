<?php

// "Varekode" => 33045, "Betegnelse" => "Blomkarse", "PrisPrEnhet" => 17.50

class Vare {
	private $varekode;
	private $betegnelse;
	private $prisPrEnhet;
	
		function Vare($v, $b, $p) {
			$this->varekode = $v;
			$this->betegnelse = $b;
			$this->prisPrEnhet = $p;
		}
		
		function økPris($tillegg) {
			$prisPrEnhet += $tillegg;
		}
		
		function getPris() {
			return $prisPrEnhet;
		}
		
}

// "Varekode" => 33045, "Betegnelse" => "Blomkarse", "PrisPrEnhet" => 17.50


$vare1 = new Vare(33045, "Blomkarse", 17.50);
$vare2 = new Vare(33044, "Blandet blomsterfrø", 14.50);

print_r($vare1);

echo '<br>';

print_r($vare2);

$vareTab = array ($vare1, $vare2);

print_r ($vareTab);


?>












