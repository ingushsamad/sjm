<?php
var_dump($_POST);
//exit;
if (isset($_POST['action']))
{
	$manager = new CommentManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		// Etape 1 : Vérifier la présence de tous les champs nécessaires
		// title, content, image, author
		if (isset($_POST['content'], $_POST['author'], $_POST['note']))// isset : http://php.net/manual/fr/function.isset.php : is set : est définie
		{
			// Etape 2 : Vérifier la validité des champs
			
			$content = $_POST['content'];
			$author = $_POST['author'];
			$author = $_POST['note'];
			//$author = $_SESSION['id'];

			$manager->create($content, $author, $note);
			// $note = $_POST['note'];
			// if (...)
			// Etape 3 : Traitement
			// $sql = "INSERT INTO comments (content, id_author, id_article) VALUES('".$content."', '".$author."', '".$article."')";
			// mysqli_query($db, $sql);// A RETENIR !!!!!
			// Etape 4 : PRG
			header('Location: index.php?page=home');// http://php.net/manual/fr/function.header.php
			exit;
		}
	}
	else if ($action == 'edit')
	{
		// Etape 1 : Vérifiaaaaaaaer la présence de tous les champs nécessaires
		// title, content, image, author, id
		if (isset($_POST['content'], $_POST['author'], $_POST['note'], $_POST['id']))// isset : http://php.net/manual/fr/function.isset.php : is set : est définie
		{
			// Etape 2 : Vérifier la validité des champs
			$content = $_POST['content'];
			$email = $_POST['email'];
			$author = $_POST['author'];
			$note = $_POST['note'];
			$id = $_POST['id'];


			// Etape 3 : Traitementa	
			$comment = $manager->find($id);
			$comment->setContent($content);
			$comment->setNote($note);
			$manager->save($comment);

			// if (...)
			// Etape 3 : Traitement
			//$sql = "UPDATE comments SET content='".$content."', author='".$author."' WHERE id=".$id;
			//mysqli_query($db, $sql);
			// Etape 4 : PRG
			header('Location: index.php?page=home');// http://php.net/manual/fr/function.header.php
			exit;
		}
	}
	else if ($action == 'delete')
	{
		// Etape 1 : Vérifier la présence de tous les champs nécessaires
		// title, content, image, author, id
		if (isset($_POST['id']))// isset : http://php.net/manual/fr/function.isset.php : is set : est définie
		{
			// Etape 2 : Vérifier la validité des champs
			$id = $_POST['id'];
			// if (...)
			// Etape 3 : Traitement
			$comment = $manager->find($id);
			$manager->remove($comment);
			// $sql = "DELETE FROM comments WHERE id=".$id;
			// mysqli_query($db, $sql);
			// Etape 4 : PRG
			header('Location: index.php?page=home');// http://php.net/manual/fr/function.header.php
			exit;
		}
	}
}
?>