<?php
class Booking
{
	private $id;
	private $customerName;
	private $customerTel;
	private $date;
	private $comments;


	public function getId()
	{
		return $this->id;
	}

	public function getCustomerName()
	{
		return $this->customerName;
	}
	public function setCustomer_name($customerName)
	{
		$this->customerName = $customerName;
	}	

	public function getCustomerTel()
	{
		return $this->customerTel;
	}
	public function setCustomerTel($customerTel)
	{
		$this->customerTel = $customerTel;
	}	

	public function getDate()
	{
		return $this->date;
	}

		public function getComments()
	{
		return $this->comments;
	}
	public function setComments($comments)
	{
		$this->comments = $comments;
	}
}
?>