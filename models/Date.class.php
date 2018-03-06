<?php
class Date
{
	private $date;
	private $miday;

	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function setDate($date)
	{
		$this->date = $date;
	}
	public function getMiday()
	{
		return $this->miday;
	}
	public function setMiday($miday)
	{
		// 0 = les deux; 1 = midi; 2 = soir
		$this->miday = $miday;
	}	
}
