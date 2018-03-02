<?php
if (isset($_POST['action']))
{
	$manager = new DeliveryManager($pdo);
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['title'], $_POST['content'], $_POST['image'], $_SESSION['id']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$image = $_POST['image'];
			$author = $_SESSION['id'];

			
			$article = $manager->create($title, $content, $image, $author);
			// $sql = "INSERT INTO articles (title, content, image, author) VALUES('".$title."', '".$content."', '".$image."', '".$author."')";
			// mysqli_query($db, $sql);
			header('Location: index.php?page=article&id='.$article->getId());
			exit;
		}
	}
	else if ($action == 'edit')
	{
		if (isset($_POST['title'], $_POST['content'], $_POST['image'], $_SESSION['id'], $_POST['id']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$image = $_POST['image'];
			$id = $_POST['id'];
			$article = $manager->find($id);
			$article->setTitle($title);
			$article->setContent($content);
			$article->setImage($image);
			$manager->save($article);
			//$sql = "UPDATE articles SET title='".$title."', content='".$content."', image='".$image."', author='".$author."' WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=article&id='.$id);
			exit;
		}
	}
	else if ($action == 'delete')
	{
		if (isset($_POST['id']))
		{
			$id = $_POST['id'];
			$article = $manager->find($id);
			$manager->remove($article);
			//$sql = "DELETE FROM articles WHERE id=".$id;
			//mysqli_query($db, $sql);
			header('Location: index.php?page=home');
			exit;
		}
	}
}
?>