<?php
class Article
{
	private $id;
	private $title;
	private $content;
	private $id_author;
	private $image;
	private $date;
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function setTitle($title)
	{
		$this->title = $title;
	}
	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}
	public function getIdAuthor()
	{
		return $this->id_author;
	}
	public function setIdAuthor($id_author)
	{
		$this->id_author = $id_author;
	}
	public function getImage()
	{
		return $this->image;
	}
	public function setImage($image)
	{
		$this->image = $image;
	}
	public function getDate()
	{
		return $this->date;
	}

	public function getAuthor()
	{
		// Récupération du manager qui gère les utilisateurs
		$manager = new UserManager($this->pdo);

		// On récupère l'utilisateur qui correspond à l'id de l'auteur
		$user = $manager->findById($this->id_author);
		return $user;
	}
}
?>