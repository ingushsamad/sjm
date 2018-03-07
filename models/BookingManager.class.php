<?php
class BookingManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM booking WHERE id=?");
		$query->execute([$id]);
		$booking = $query->fetchObject('Booking', [$this->pdo]);
		return $booking;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM booking");
		$bookings = $query->fetchAll(PDO::FETCH_CLASS, 'Booking', [$this->pdo]);
		return $bookings;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($customer_name, $customer_tel, $comments, $date, $nbr)
	{
		$booking = new Booking($this->pdo);
		$booking->setCustomerName($customer_name);
		$booking->setCustomerTel($customer_tel);
		$booking->setComments($comments);
		$booking->setDate($date);
		$booking->setNbr($nbr);
		var_dump($booking->getNbr());

		$query = $this->pdo->prepare("INSERT INTO booking (customer_name, customer_tel, comments, date, nbr) VALUES(?, ?, ?, ?, ?)");
		$query->execute([$booking->getCustomerName(), $booking->getCustomerTel(), $booking->getComments(), $booking->getDate(), $booking->getNbr()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(Booking $booking)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM booking WHERE id=?");
		$query->execute([$booking->getId()]);
	}
	public function save(Booking $booking)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE booking SET customer_name=?, customer_tel=?,, comments=?, date=?, nbr=? WHERE id=?");
		$query->execute([$booking->getCustomerName(), $booking->getCustomerTel(), $booking->getComments(), $booking->getDate(), $booking->getNbr(), $booking->getId()]);
		return $this->find($booking->getId());
	}
}
?>