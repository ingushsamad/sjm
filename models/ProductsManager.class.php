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
		$query = $this->pdo->prepare("SELECT * FROM products WHERE id=?");
		$query->execute([$id]);
		$product = $query->fetchObject('Products', [$this->pdo]);
		return $product;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM products");
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products', [$this->pdo]);
		return $products;
	}
	public function findByCategory(Category $category)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE category_id = ? ORDER BY name");
		$query->execute([$category->getId()]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products', [$this->pdo]);
		return $products;
	}
	public function findByName($name)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE name = ?");
		$query->execute([$name]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products', [$this->pdo]);
		return $products;
	}
	public function findByPrice($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM products WHERE price = ?");
		$query->execute([$id]);
		$products = $query->fetchAll(PDO::FETCH_CLASS, 'Products', [$this->pdo]);
		return $products;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function remove(Product $products)
	{
		$query = $this->pdo->prepare("DELETE FROM products WHERE id = ?");
		$query->execute([$products->getId()]);
	}
	/*public function create($content, $id_author, $id_article)
	{
		$query = $this->pdo->prepare("INSERT INTO comments (content, id_author, id_article) VALUES(?, ?, ?)");
		$query->execute([$content, $id_author, $id_article]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}*/

	public function create($name, $image, $price, Category $category)
	{
		$product = new Product($this->pdo);
		$product->setName($name);
		$product->setImage($image);
		$product->setPrice($price);
		$product->setCategory($category);
		$query = $this->pdo->prepare("INSERT INTO comments (name, image, price, category_id) VALUES(?, ?, ?, ?)");
		$query->execute([$product->getName(), $product->getImage(), $product->getPrice(), $product->getCategory()->getId()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}


	public function save(Product $products)
	{
		$query = $this->pdo->prepare("UPDATE products SET name = ?, image = ?, price = ?, category_id = ? WHERE id = ?");
		$query->execute([$products->getName(), $products->getImage(), $products->getPrice(), $products->getCategory()->getId(), $products->getId()]);
		return $this->find($products->getId());
	}
}
?>