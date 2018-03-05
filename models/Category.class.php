<?php
class Category
{
	private $id;
	private $name;
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getProducts()
	{
		$manager = new ProductsManager($this->pdo);
		$products = $manager->findByCategory($this->id);
		return $products;
	}

}
?>