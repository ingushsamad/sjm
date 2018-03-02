<?php
class Delivery
{
	private $id;
<<<<<<< HEAD
	private $customer_name;
	private $customer_tel;
	private $customer_address;
	private $customer_city;
=======
	private $customerName;
	private $customerTel;
	private $customerAdress;
	private $customerCity;
>>>>>>> ea2e631abd38167c4e2b66e1e107eec4a8ed1500
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

<<<<<<< HEAD
	public function getCustomerAddress()
=======
	public function getCustomerAdress()
>>>>>>> ea2e631abd38167c4e2b66e1e107eec4a8ed1500
	{
		return $this->customerAdress;
	}
<<<<<<< HEAD
	public function setCustomerAddress($customer_address)
	{
		$this->customer_address = $customer_address;
=======
	public function setCustomerAdress($customerAdress)
	{
		$this->customerAdress = $customerAdress;
>>>>>>> ea2e631abd38167c4e2b66e1e107eec4a8ed1500
	}	

	public function getCustomerCity()
	{
		return $this->customerCity;
	}
<<<<<<< HEAD
	public function setCustomerCity($customer_city)
=======
	public function setCustomerCity($customerCity)
>>>>>>> ea2e631abd38167c4e2b66e1e107eec4a8ed1500
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
<<<<<<< HEAD
	public function setProductId($product_id)
=======
	public function setProductId($productId)
>>>>>>> ea2e631abd38167c4e2b66e1e107eec4a8ed1500
	{
		$this->productId = $productId;
	}	

		public function getDate()
	{
		return $this->date;
	}
}
?>