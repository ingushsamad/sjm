<?php
class Booking
{
	private $id;
	private $customer_name;
	private $customer_tel;
	private $date;
	private $comments;
	private $nbr;

	private $pdo;


	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getCustomerName()
	{
		return $this->customer_name;
	}
	public function setCustomerName($customer_name)
	{
		if (strlen($customer_name) < 2 || strlen($customer_name) > 63)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille du nom invalide (Il doit être compris entre 2 et 63 caractères)");
		}
		else
			$this->customer_name = $customer_name;
	}	
	public function getCustomerTel()
	{
		return $this->customer_tel;
	}
	public function setCustomerTel($customer_tel)
	{
		if (strlen($customer_tel) < 8 || strlen($customer_tel) > 63)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille du téléphone invalide (Il doit être compris entre 8 et 63 caractères)");
		}
		else
			$this->customer_tel = $customer_tel;
	}	
	public function getComments()
	{
		return $this->comments;
	}
	public function setComments($comments)
	{
		if (strlen($comments) > 511)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille du commentaire invalide (Il doit être inférieur à 511 caractères)");
		}
		else
			$this->comments = $comments;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function setDate($date)
	{
		$date = date('Y-m-d H:i:s', strtotime($date));
		$this->date = $date;
	}

	public function getNbr()
	{
		return $this->nbr;
	}
	public function setNbr($nbr)
	{
		$this->nbr = $nbr;
	}
}
