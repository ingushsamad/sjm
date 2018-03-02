<?php
class MenuManager
{
	// Pour corriger le bug de pdo inexistant il faut :
	// Ajouter $pdo aux propriétés des managers
	// Ajouter le constructeur aux managers
	// Modifier chaque création de Manager $xxx = new XxxManager(); par $xxx = new XxxManager($pdo);
	private $pdo;

	public function __construct($pdo)// new MenuManager($pdo);
	{
		$this->pdo = $pdo;
	}
	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM menu WHERE id=?");
		$query->execute([$id]);
		$article = $query->fetchObject('Menu', [$this->pdo]);
		return $article;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM menu");
		$menu = $query->fetchAll(PDO::FETCH_CLASS, 'Menu', [$this->pdo]);
		return $menu;
	}
	public function findRandom()
	{
		$query = $this->pdo->query("SELECT * FROM menu ORDER BY RAND() LIMIT 1");
		$article = $query->fetchObject('Menu', [$this->pdo]);
		return $article;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function create($title, $content, $image, $id_author)
	{
		$query = $this->pdo->prepare("INSERT INTO menu (title, content, image, id_author) VALUES(?, ?, ?, ?)");
		$query->execute([$title, $content, $image, $id_author]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(Article $article)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM menu WHERE id=?");
		$query->execute([$article->getId()]);
	}
	public function save(Article $article)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE menu SET title=?, content=?, image=?, id_author=? WHERE id=?");
		$query->execute([$article->getTitle(), $article->getContent(), $article->getImage(), $article->getIdAuthor(), $article->getId()]);
		return $this->find($article->getId());
	}
}
?>