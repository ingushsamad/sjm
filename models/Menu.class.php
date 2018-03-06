<?php

class Menu {

	private $id;
	private $name;
	private $description;
	private $discount;
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getId()
	{
		return $this->id;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setDescription($desc)
	{
		$this->description = $desc;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDiscount($int)
	{
		$this->discount = $int;
	}
	public function getDiscount()
	{
		return $this->discount;
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