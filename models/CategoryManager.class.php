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
		$product = $query->fetchObject('Category');
		return $product;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM category");
		$category = $query->fetchAll(PDO::FETCH_CLASS, 'Category');
		return $category;
	}
	public function findByCategoryId($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM category WHERE category_id = ?");
		$query->execute([$id]);
		$category = $query->fetchAll(PDO::FETCH_CLASS, 'Category');
		return $category;
	}
	public function findByName($name)
	{
		$query = $this->pdo->prepare("SELECT * FROM category WHERE name = ?");
		$query->execute([$name]);
		$category = $query->fetchAll(PDO::FETCH_CLASS, 'Category');
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
	/*public function create($content, $id_author, $id_article)
	{
		$query = $this->pdo->prepare("INSERT INTO comments (content, id_author, id_article) VALUES(?, ?, ?)");
		$query->execute([$content, $id_author, $id_article]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}*/
	public function save(Category $category)
	{
		$query = $this->pdo->prepare("UPDATE category SET name = ?, image = ?, category_id = ?, price = ? WHERE id = ?");
		$query->execute([$category->getContent(), $category->getIdAuthor(), $category->getIdArticle(), $category->getNote(), $category->getId()]);
		return $this->find($category->getId());
	}
}
?>