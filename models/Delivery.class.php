<?php
class Delivery
{
	private $id;
	private $customerName;
	private $customerTel;
	private $customerAdress;
	private $customerCity;
	private $comments;
	private $date;
	private $productId;



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
		$this->customerName = $customerName;
	}	

	public function getCustomerTel()
	{
		return $this->customerTel;
	}
	public function setCustomerTel($customer_tel)
	{
		$this->customerTel = $customerTel;
	}	

	public function getCustomerAdress()
	{
		return $this->customerAdress;
	}
	public function setCustomerAdress($customerAdress)
	{
		$this->customerAdress = $customerAdress;
	}	

	public function getCustomerCity()
	{
		return $this->customerCity;
	}
	public function setCustomerCity($customerCity)
	{
		$this->customerCity = $customerCity;
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
	public function setProductId($productId)
	{
		$this->productId = $productId;
	}	

		public function getDate()
	{
		return $this->date;
	}
}
?>