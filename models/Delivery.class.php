<?php
class Delivery
{
	private $id;
	private $customer_name;
	private $customer_tel;
	private $customer_adress;
	private $customer_city;
	private $comments;
	private $date;
	private $product_id;



	public function getId()
	{
		return $this->id;
	}

	public function getCustomer_name()
	{
		return $this->customer_name;
	}
	public function setCustomer_name($customer_name)
	{
		$this->customer_name = $customer_name;
	}	

	public function getCustomer_tel()
	{
		return $this->customer_tel;
	}
	public function setCustomer_tel($customer_tel)
	{
		$this->customer_tel = $customer_tel;
	}	

	public function getCustomer_adress()
	{
		return $this->customer_adress;
	}
	public function setCustomer_adress($customer_adress)
	{
		$this->customer_adress = $customer_adress;
	}	

	public function getCustomer_city()
	{
		return $this->customer_city;
	}
	public function setCustomer_city($customer_city)
	{
		$this->customer_city = $customer_city;
	}	

	public function getComments()
	{
		return $this->comments;
	}
	public function setComments($comments)
	{
		$this->comments = $comments;
	}

	public function getProduct_id()
	{
		return $this->product_id;
	}
	public function setProduct_id($product_id)
	{
		$this->product_id = $product_id;
	}	

		public function getDate()
	{
		return $this->date;
	}
}
?>