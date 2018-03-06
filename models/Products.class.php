<?php
class Products
{
	private $id;
	private $name;
	private $image;
	private $price;
	private $category_id;

	private $pdo;
	private $category;

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
			throw new Exception("Taille du nom invalide (Il doit être compris entre 2 et 63 caractères)");
		}
		else
			$this->name = $name;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function setImage($image)
	{
		if (strlen($image) < 2 || strlen($image) > 511)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille du nom invalide (Il doit être compris entre 2 et 511 caractères)");
		}
		else
			$this->image = $image;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
				// Si la note est comprise en 0 et 5
		if ($price > 0)
			$this->price = $price;
		else
			throw new Exception("Votre prix doit être supérieur à 0");
	}

	public function getCategory()
	{
		if ($this->category === null)
		{
			$manager = new CategoryManager($this->pdo);
			$this->category = $manager->find($this->category_id);
		}
		return $this->category;
	}

	public function setCategory(Category $category)
	{
		$this->category_id = $category->getId();
		$this->category = $category;
	}
}
?>