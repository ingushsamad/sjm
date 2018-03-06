<?php
class CategoryManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM category WHERE id=?");
		$query->execute([$id]);
		$product = $query->fetchObject('Category',[$this->pdo]);
		return $product;
	}
	public function findAll() // toutes les catégories même vides
	{
		$query = $this->pdo->query("SELECT * FROM category");
		$categories = $query->fetchAll(PDO::FETCH_CLASS, 'Category',[$this->pdo]);
		return $categories;
	}

	public function findByName($name)
	{
		$query = $this->pdo->prepare("SELECT * FROM category WHERE name = ?");
		$query->execute([$name]);
		$category = $query->fetchAll(PDO::FETCH_CLASS, 'Category',[$this->pdo]);
		return $category;
	}
    public function findById($id)
	{
		return $this->find($id);
	}

	public function remove(Category $category)
	{
		$query = $this->pdo->prepare("DELETE FROM category WHERE id = ?");
		$query->execute([$category->getId()]);
	}
	public function create($name)
	{
		$category = new Category($this->pdo);
		$category->setName($name);
		$query = $this->pdo->prepare("INSERT INTO category (name) VALUES(?)");
		$query->execute([$category->getName()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function save(Category $category)
	{
		$query = $this->pdo->prepare("UPDATE category SET name=?,  WHERE id = ?");
		$query->execute([$category->getName(), $category->getId()]);
		return $this->find($category->getId());
	}
}
?>