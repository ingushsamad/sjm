<?php
class UserManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function find($id)
	{
		$query = $this->pdo->prepare("SELECT * FROM users WHERE id=?");
		$query->execute([$id]);
		$user = $query->fetchObject('User', [$this->pdo]);
		return $user;
	}
	public function findAll()
	{
		$query = $this->pdo->query("SELECT * FROM users");
		$users = $query->fetchAll(PDO::FETCH_CLASS, 'User', [$this->pdo]);
		return $users;
	}
	public function findById($id)
	{
		return $this->find($id);
	}
	public function findByLogin($login)// getByLogin
	{
		$query = $this->pdo->prepare("SELECT * FROM users WHERE login=?");
		$query->execute([$login]);
		$user = $query->fetchObject('User', [$this->pdo]);
		return $user;
	}
	public function findByEmail($email)// getByEmail
	{
		$query = $this->pdo->prepare("SELECT * FROM users WHERE email=?");
		$query->execute([$email]);
		$user = $query->fetchObject('User', [$this->pdo]);
		return $user;
	}
	public function create($login, $password, $email)
	{
		$user = new User($this->pdo);
		$user->setLogin($login);
		$user->setPassword($password);
		$user->setEmail($email);
		$query = $this->pdo->prepare("INSERT INTO users (login, password, email) VALUES(?, ?, ?)");
		$query->execute([$user->getLogin(), $user->getHash(), $user->getEmail()]);
		$id = $this->pdo->lastInsertId();
		return $this->find($id);
	}
	public function remove(User $user)// <= type hinting
	{
		$query = $this->pdo->prepare("DELETE FROM users WHERE id=?");
		$query->execute([$user->getId()]);
	}
	public function save(User $user)// <= type hinting
	{
		$query = $this->pdo->prepare("UPDATE users SET login=?, password=?, email=? WHERE id=?");
		$query->execute([$user->getLogin(), $user->getHash(), $user->getEmail(), $user->getId()]);
		return $this->find($user->getId());
	}
}
?>