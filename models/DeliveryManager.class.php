<?php
class DeliveryManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM delivery WHERE id=?");
		$query->execute([$id]);
		$delivery = $query->fetchObject('Delivery', [$this->pdo]);
		return $delivery;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM delivery");
		$deliveries = $query->fetchAll(PDO::FETCH_CLASS, 'Delivery', [$this->pdo]);
		return $deliveries;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($customer_name, $customer_tel, $customer_address, $customer_city, $comments, $date, $list)
	{
		$delivery = new Delivery($this->pdo);
		$delivery->setCustomerName($customer_name);
		$delivery->setCustomerTel($customer_tel);
		$delivery->setCustomerAddress($customer_address);
		$delivery->setCustomerCity($customer_city);
		$delivery->setComments($comments);
		$delivery->setDate($date);
		$query = $this->pdo->prepare("INSERT INTO delivery (customer_name, customer_tel, customer_address, customer_city, comments, date) VALUES(?, ?, ?, ?, ?, ?)");
		$query->execute([$delivery->getCustomerName(), $delivery->getCustomerTel(), $delivery->getCustomerAddress(), $delivery->getCustomerCity(), $delivery->getComments(), $delivery->getDate()]);
		$id = $this->pdo->lastInsertId();
		$query_link = $this->pdo->prepare("INSERT INTO linkdelivery (delivery_id, products_id) VALUES(?, ?)");
		foreach($list AS $product)
		{
			$quantity = $product['quantity'];
			$id_product = $product['id'];
			while ($quantity > 0)
			{
				$query_link->execute([$id, $id_product]);
				$quantity--;
			}
		}
		return $this->find($id);
	}
	public function remove(Delivery $delivery)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM delivery WHERE id=?");
		$query->execute([$delivery->getId()]);
	}
	public function save(Delivery $delivery)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE delivery SET customer_name=?, customer_tel=?, customer_address=?, customer_city=?, comments=?, date=? WHERE id=?");
		$query->execute([$delivery->getCustomerName(), $delivery->getCustomerTel(), $delivery->getCustomerAddress(), $delivery->getCustomerCity(), $delivery->getComments(), $delivery->getDate(), $delivery->getId()]);
		return $this->find($delivery->getId());
	}
}
?>