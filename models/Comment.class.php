<?php
class Comment
{
	private $id;
	private $id_article;
	private $id_author;
	private $content;
	private $date;
	private $note;

	public function getId()
	{
		return $this->id;
	}
	public function getIdArticle()
	{
		return $this->id_article;
	}
	public function setIdArticle($id_article)
	{
		$this->id_article = $id_article;
	}
	public function getIdAuthor()
	{
		return $this->id_author;
	}
	public function setIdAuthor($id_author)
	{
		$this->id_author = $id_author;
	}
	public function getContent()
	{
		return $this->content;
	}
	public function setContent($content)
	{
		$this->content = $content;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getNote()
	{
		return $this->note;
	}
	public function setNote($note)
	{
		$this->note = $note;
	}
}
?>