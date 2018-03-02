<?php

try
{
	session_start();
	var_dump($_SESSION, $_GET, $_POST);

	// Tableau de configuration de PDO
	$options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	];

	$pdo = new PDO('mysql:dbname=blog;host=127.0.0.1', 'root', 'troiswa', $options);

	$error = '';
	$page = 'home';
	$access = ['home', 'article', 'create', 'edit', 'register', 'login'];
	if (isset($_GET['page']))
	{
		// Si jamais la page se trouve dans la liste des pages
		// on peut y accéder
		if (in_array($_GET['page'], $access))
		{
			$page = $_GET['page'];
		}
		else // La page ne se trouve pas dans la liste des pages du site
		{
			throw new Exception('La page n\'existe pas');
		}
	}

// http://php.net/manual/fr/function.autoload.php
/*
function __autoload($classname)// Cette fonctionalité est devenue OBSOLETE depuis PHP 7.2.0. Nous vous encourageons vivement à ne plus l'utiliser.
{
	require('models/'.$classname.'.class.php');
}
*/
// http://php.net/manual/fr/function.spl-autoload-register.php

	spl_autoload_register(function($classname)// BONNE VERSION
	{
		require('models/'.$classname.'.class.php');
	});
	/*require('apps/traitements/article.php');*/
	require('apps/traitements/user.php');
	require('apps/traitements/comment.php');
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

/*  Ancienne Version mysqli  gardée pour info
session_start();
// http://php.net/manual/fr/function.mysqli-connect.php
$db = mysqli_connect("localhost", "root", "troiswa", "blog");
if (!$db)
{
    die('Erreur de connexion ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
echo 'Succès... ' . mysqli_get_host_info($db) . "\n";
// mysqli_close($db);


// http://localhost/phpmyadmin
var_dump($_SESSION);
// http://3wa.belzorash.com/
// https://scrimba.com/
$page = 'home';
$access = ['home', 'article', 'create', 'edit' , 'register', 'login', 'comments'];
if (isset($_GET['page']))
{
	if (in_array($_GET['page'], $access))// http://php.net/manual/fr/function.in-array.php
	{
		$page = $_GET['page'];
	}
}
$error = '';
require('apps/traitements/article.php');
require('apps/traitements/user.php');
require('apps/traitements/comment.php');
// var_dump($error);
require('apps/base.php');  */
?>  