<?php
class Linkmenu
{
	private $menu_id;
	private $product_id;
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getMenuId()
	{
		return $this->menu_id;
	}

	public function setMenuId()
	{
		$this->menu_id;
	}

	public function getProductId()
	{
		return $this->product_id;
	}

	public function setProductId()
	{		
		$this->product_id;
	}
}
?>