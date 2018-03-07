<?php

try
{
	session_start();
	
	if (is_file("apps/config.php"))
	{
		require("apps/config.php");
	}
	else
	{
		throw new Exception('Fichier de configuration obligatoire (config.php)');
	}

	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	];

	$pdo = new PDO($dsn, $db_user, $db_password, $options);

	$error = '';
	$page = 'home';
	$access = ['home', 'carte','delivery','booking', 'goldbook'];
	
	if (isset($_GET['page']))
	{
	
		if (in_array($_GET['page'], $access))
		{
			$page = $_GET['page'];
		}
		else
		{
			throw new Exception('La page n\'existe pas');
		}
	}
	
	spl_autoload_register(function($classname)
	{
		require('models/'.$classname.'.class.php');
	});
	
	require('apps/traitements/user.php');
	require('apps/traitements/carte.php');
	require('apps/traitements/comment.php');
    require('apps/traitements/delivery.php');
    require('apps/traitements/booking.php');
	require('apps/base.php');
}
catch (PDOException $pdoException)
{
	exit('Erreur de base de données : ' . $pdoException->getMessage());
}
catch (Exception $exception)
{
	exit('Erreur : ' . $exception->getMessage());
}
