<?php
class dbUses {
	public $error, $dead, $link;
	function __construct($A = []){
		$this->link = @new mysqli(
			(!isset($A['host']) ? 'localhost' : $A['host']),
			(!isset($A['username']) ? 'root' : $A['username']),
			(!isset($A['password']) ? 'password' : $A['password']),
			(!isset($A['database']) ? 'database' : $A['database']),
			(!isset($A['port']) ? null : $A['port']),
			(!isset($A['socket']) ? null : $A['socket'])
		);
		if($this->link->connect_errno){ $this->dead = $this->error = $this->link->connect_error; }
	}
	function run($str){
		if($this->dead){ return; }
		$str = $this->link->query($str);
		if(!$this->link->errno){ return $str; }
		else { $this->error = $this->link->error; }
	}
	function runs($arr){
		if($this->dead){ return; }
		$this->link->multi_query(implode(';', $arr) . ';');
		$l = count($arr);
		$arr = [];
		$this->error = [];
		$n = 0;
		do {
			if(!$this->link->errno){ $arr[$n] = $this->link->store_result(); }
			else { $this->error[$n] = $this->link->error; }
			if($this->link->more_results()){ $this->link->next_result(); }
			$n++;
		}
		while($n < $l);
		return $arr;
	}
	function escape($str){ return (!$this->dead ? $this->link->escape_string($str) : $str); }
	function charset($str){ return (!$this->dead ? (!$str ? $this->link->get_charset() : $this->link->set_charset($str)) : 0); }
	function __destruct(){ return (!$this->dead ? $this->link->close() : 0); }
}
?>