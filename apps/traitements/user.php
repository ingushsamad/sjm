<?php
if (isset($_GET['page']) && $_GET['page'] == 'logout')
{
	session_destroy();
	header('Location: index.php');
	exit;
}


if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'login')
	{
		if (isset($_POST['login'], $_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];

			$manager = new UserManager($pdo);
			$user = $manager->findByLogin($login);
			if ($user)
			{
				if ($user->verifPassword($password))
				{
					$_SESSION['id'] = $user->getId();
					header('Location: index.php');
					exit;
				}
				else
				{
					$error = "L'utilisateur ou le mot de passe est incorrect.";
				}
			}
			else
			{
				$error = "L'utilisateur ou le mot de passe est incorrect.";
			}
		}
	}
	else if ($action == 'register')
	{
		var_dump($_POST);
		if (isset($_POST['login'], $_POST['password'], $_POST['email']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			$manager = new UserManager($pdo);

			try
			{
				$user = $manager->create($login, $password, $email);
			}
			catch (Exception $exception)
			{
				$error = $exception->getMessage();
			}
			//
			if (!$error)
			{
				header('Location: index.php');
				exit;
			}
		}
	}
}

?>