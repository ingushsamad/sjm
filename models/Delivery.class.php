<?php
class Delivery
{
	private $id;
	private $customer_name;
	private $customer_tel;
	private $customer_address;
	private $customer_city;
	private $comments;
	private $date;

	private $pdo;
	private $products;


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

	public function getCustomerAddress()
	{
		return $this->customer_address;
	}
	public function setCustomerAddress($customer_address)
	{
		if (strlen($customer_address) < 8 || strlen($customer_address) > 63)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille de l'adresse invalide (Il doit être compris entre 8 et 63 caractères)");
		}
		else
			$this->customer_address = $customer_address;
	}	

	public function getCustomerCity()
	{
		return $this->customer_city;
	}
	public function setCustomerCity($customer_city)
	{
		if (strlen($customer_city) < 2 || strlen($customer_city) > 63)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille de la ville invalide (Il doit être compris entre 2 et 63 caractères)");
		}
		else
			$this->customer_city = $customer_city;
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
		$full = explode(' ', $date);
		$date = explode('/', $full[0]);
		$time = explode(':', $full[1]);
		// FROM 08/3/2018 11:00
		// TO 2018-03-08 00:00:00
		if ($date[1] < 10)
			$date[1] = '0'.$date[1];
		$this->date = $date[2].'-'.$date[1].'-'.$date[0].' '.$time[0].':'.$time[1].':00';
	}
	public function getProducts()
	{
		if ($this->products === null)
		{
			$manager = new ProductsManager($this->pdo);
			$this->products = $manager->findByDelivery($this);
		}
		return $this->products;
	}
	public function addProduct(Products $product)
	{
		$this->getProducts();
		$this->products[] = $product;
	}
	public function removeProduct(Products $product)
	{
		$this->getProducts();
		foreach ($this->products AS $pos => $loc_product)
		{
			if ($loc_product->getId() === $product->getId())
			{
				array_splice($this->products, $pos, 1);
				return $this->getProducts();
			}
		}
	}
}
?>