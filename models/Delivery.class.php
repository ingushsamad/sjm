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

	public function getCustomerName()
	{
		return $this->customerName;
	}
	public function setCustomerName($customer_name)
	{
		$this->customer_name = $customer_name;
	}	

	public function getCustomerTel()
	{
		return $this->customerTel;
	}
	public function setCustomerTel($customer_tel)
	{
		$this->customer_tel = $customer_tel;
	}	

	public function getCustomerAdress()
	{
		return $this->customerAdress;
	}
	public function setCustomer_adress($customer_adress)
	{
		$this->customer_adress = $customer_adress;
	}	

	public function getCustomerCity()
	{
		return $this->customerCity;
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

	public function getProductId()
	{
		return $this->productId;
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