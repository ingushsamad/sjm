<?php
class Products
{
	private $id;
	private $name;
	private $image;
	private $price;
	private $category_id;
	private $pdo;

	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function setName($name)
	{
		$this->name = $name;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price)
	{
		$this->price = $price;
	}
	public function getCategory()
	{
		return $category_id;
	}
	public function setCatergory($id)
	{
		$this->category_id = $id;
	}
}
?>