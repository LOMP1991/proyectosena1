<?php

class database{
	
	public $result;
	
	public function __construct(){ }
	
	/*public function select($quer){
		return $this->result = mysqli_query($quer);
	}*/
	function mysqli_query(mysqli $mysql, string $query, int $result_mode = MYSQLI_STORE_RESULT)  
	{

	}
}

?>