<?php
class ProductsManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * F ROM products WHERE id=?");
		$query->execute([$id]);
		$product = $query->fetchObject('Product');
		return $product;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM products");
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products');
		return $products;
	}
	public function findByCategoryId($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE categroy_id=?");
		$query->execute([$id]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products');
		return $products;
	}
	public function findByName($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE name=?");
		$query->execute([$id]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products');
		return $products;
	}
    public function findByPrice($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE price=?");
		$query->execute([$id]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products');
		return $products;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function remove(Products $products)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM products WHERE id=?");
		$query->execute([$products->getId()]);
	}
	/*public function create($content, $id_author, $id_article)
	{
		$query = $this->pdo->prepare("INSERT INTO comments (content, id_author, id_article) VALUES(?, ?, ?)");
		$query->execute([$content, $id_author, $id_article]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}*/
	public function save(Products $products)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE products SET name=?, image=?, category_id=?, price=? WHERE id=?");
		$query->execute([$products->getContent(), $products->getIdAuthor(), $products->getIdArticle(), $products->getNote(), $products->getId()]);
		return $this->find($products->getId());
	}
}
?>