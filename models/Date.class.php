<?php
class Date
{
	private $id;
	private $date;
	private $miday; // 0 = les deux; 1 = midi; 2 = soir

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getMiday()
	{
		return $this->miday;
	}
	public function setDate()
	{
		$this->date;
	}
	public function setMiday()
	{
		$this->miday;
	}
	public function setMiday($name)
	{
		$this->miday = $miday;
	}	
}
?>

