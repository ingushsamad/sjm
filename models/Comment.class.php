<?php
class Comment
{
	private $id;
	private $content;
	private $note;
	private $author;
	private $email;
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

	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		if (strlen($content) < 4 || strlen($content) > 511)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille du commentaire invalide (Il doit être compris entre 4 et 511 caractères)");
		}
		else
			$this->content = $content;
	}	

	public function getNote()
	{
		return $this->note;
	}
	public function setNote($note)
	{
		// Si la note est comprise en 0 et 5
		if ($note >= 0 && $note <= 5)
			$this->note = $note;
		else
			throw new Exception("Votre note doit être comprise entre 0 et 5");
	}	

	public function getAuthor()
	{
		return $this->author;
	}
	public function setAuthor($author)
	{
		if (strlen($author) < 4 || strlen($author) > 127)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Auteur invalide (Il doit être compris entre 4 et 127 caractères)");
		}
		else
			$this->author = $author;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
			$this->email = $email;
		else
			throw new Exception("Email invalide");
	}

	public function getDate()
	{
		return $this->date;
	}
}
?>