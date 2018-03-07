<?php
// User.class.php : http://192.168.1.22/partage/User.class.php
class User
{
	// Propriétés (variables)
	private $id;// private = protégé de l'extérieur => encapsulation
	private $login;
	private $password;
	private $email;

	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	// Méthodes (fonctions)
	public function getId()// getter de id
	{
		return $this->id;
	}
	public function getLogin()
	{
		return $this->login;
	}
	public function setLogin($login)
	{
		if (strlen($login) < 2 || strlen($login) > 63)// strlen => str len => string length => taille de la chaine
		{
			throw new Exception("Taille du login invalide (Il doit être compris entre 2 et 63 caractères)");
		}
		else
			$this->login = $login;
	}
	public function getHash()
	{
		return $this->password;
	}
	public function verifPassword($password)
	{
		// http://php.net/manual/fr/function.password-verify.php
		return password_verify($password, $this->password);
	}
	public function setPassword($password)// http://php.net/manual/fr/function.password-hash.php
	{
		if (strlen($password) > 4)// strlen = str len = string length = taille de la chaine
		{
			$this->password = password_hash($password, PASSWORD_DEFAULT, ["cost"=>11]);
		}
		else
		{
			throw new Exception("Mot de passe trop court (< 10 caractères)");
		}
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
}

?>