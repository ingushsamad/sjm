<?php
class Category
{
	private $id;
	private $name;

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
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		if (strlen($name) < 2 || strlen($name) > 63)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Nom de la catégorie invalide (Il doit être compris entre 2 et 63 caractères)");
		}
		else
			$this->name = $name;
	}
	public function getProducts()
	{
		if ($this->products === null)
		{
			$manager = new ProductsManager($this->pdo);
			$this->products = $manager->findByCategory($this);
		}
		return $this->products;
	}
}
?>