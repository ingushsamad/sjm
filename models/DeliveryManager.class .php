<?php
class Delivery
{
	private $id;
	private $customer_name;
	private $customer_tel;
	private $customer_address;
	private $customer_city;
	private $comments;
	private $date;
	private $product_id;



	public function getId()
	{
		return $this->id;
	}

	public function getCustomerName()
	{
		return $this->customer_name;
	}
	public function setCustomerName($customer_name)
	{
		$this->customer_name = $customer_name;
	}	

	public function getCustomerTel()
	{
		return $this->customer_tel;
	}
	public function setCustomerTel($customer_tel)
	{
		$this->customer_tel = $customer_tel;
	}	

	public function getCustomerAddress()
	{
		return $this->customer_adress;
	}
	public function setCustomerAddress($customer_address)
	{
		$this->customer_address = $customer_address;
	}	

	public function getCustomerCity()
	{
		return $this->customer_city;
	}
	public function setCustomerCity($customer_city)
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

	public function getProductId()
	{
		return $this->product_id;
	}
	public function setProductId($product_id)
	{
		$this->product_id = $product_id;
	}	

		public function getDate()
	{
		return $this->date;
	}
}
?>