<?php
class CommentManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM comments WHERE id=?");
		$query->execute([$id]);
		$comment = $query->fetchObject('Comment', [$this->pdo]);
		return $comment;
	}

	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM comments ORDER BY date DESC");
		$comments = $query->fetchAll(PDO::FETCH_CLASS, 'Comment', [$this->pdo]);
		return $comments;
	}
	public function findLast()
	{
		$query = $this->pdo->query("SELECT * FROM comments ORDER BY date DESC LIMIT 5");
		$comments = $query->fetchAll(PDO::FETCH_CLASS, 'Comment', [$this->pdo]);
		return $comments;
	}

	/*public function findByIdAuthor($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM comments WHERE id_author=?");
		$query->execute([$id]);
		$comments = $query->fetchAll(PDO::FETCH_CLASS, 'Comment', [$this->pdo]);
		return $comments;
	}*/

	public function findById($id)
	{
		return $this->find($id);
	}

	public function remove(Comment $comment)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM comments WHERE id=? LIMIT 1");
		$query->execute([$comment->getId()]);
	}

	public function create($content, $note, $author, $email)
	{
		$comment = new Comment($this->pdo);
		$comment->setContent($content);
		$comment->setNote($note);
		$comment->setAuthor($author);
		$comment->setEmail($email);
		$query = $this->pdo->prepare("INSERT INTO comments (content, note, author, email) VALUES(?, ?, ?, ?)");
		$query->execute([$comment->getContent(), $comment->getNote(), $comment->getAuthor(), $comment->getEmail()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}

	public function save(Comment $comment)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE comments SET content=?, note=? WHERE id=?");
		$query->execute([$comment->getContent(), $comment->getNote(), $comment->getId()]);
		return $this->find($comment->getId());
	}

}
?>