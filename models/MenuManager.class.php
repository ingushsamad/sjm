<?php

class MenuManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM menu WHERE id=?");
		$query->execute([$id]);
		$article = $query->fetchObject('Menu', [$this->pdo]);
		return $article;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM menu");
		$menu = $query->fetchAll(PDO::FETCH_CLASS, 'Menu', [$this->pdo]);
		return $menu;
	}
	public function findRandom()
	{
		$query = $this->pdo->query("SELECT * FROM menu ORDER BY RAND() LIMIT 1");
		$article = $query->fetchObject('Menu', [$this->pdo]);
		return $article;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($title, $content, $image, $id_author)
	{
		$query = $this->pdo->prepare("INSERT INTO menu (title, content, image, id_author) VALUES(?, ?, ?, ?)");
		$query->execute([$title, $content, $image, $id_author]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(Menu $menu)
	{
		$query = $this->pdo->prepare("DELETE FROM menu WHERE id=?");
		$query->execute([$menu->getId()]);
	}
	public function save(Menu $menu)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE menu SET order_number=?, order_date=?, customer_id=? WHERE order_number=?");
		$query->execute([$menu->getOrderNumber(), $menu->getOrderDate(), $menu->getCustomerId()]);
		$products = $menu->getProducts();
		$query_reset = $this->pdo->prepare("DELETE FROM menu WHERE order_number=?");
		$query_reset->prepare([$menu->getOrderNumber()]);
		$query_save = $this->pdo->prepare("INSERT INTO menu (order_Number, products_id) VALUES(?, ?)");
		foreach ($menu->getProducts() AS $product)
		{
			$query_save->execute([$menu->getOrderNumber(), $product->getProductId()]);
		}
		return $this->find($menu->getOrderNumber());
	}
}
?>