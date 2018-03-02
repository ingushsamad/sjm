<?php
class Comment
{
	private $id;
	private $content;
	private $note;
	private $author;
	private $email;
	private $date;


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
		$this->content = $content;
	}	

	public function getNote()
	{
		return $this->note;
	}
	public function setNote($note)
	{
		$this->note = $note;
	}	

	public function getAuthor()
	{
		return $this->author;
	}
	public function setIdAuthor($author)
	{
		$this->id_author = $author;
	}

	public function getEmail()
	{
		return $this->email;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getDate()
	{
		return $this->date;
	}
}
?>