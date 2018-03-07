<?php
if (isset($_POST['action']))
{
	$manager = new DeliveryManager($pdo);
	$action = $_POST['action'];
	if ($action == 'delivery')
	{
		if (isset($_POST['customer_name'], $_POST['customer_tel'], $_POST['customer_address'], $_POST['customer_city'], $_POST['comments'], $_POST['date'],$_POST['commande'] ))
		{
			$cutomer_name = $_POST['customer_name'];
			$customer_tel = $_POST['customer_tel'];
			$customer_address = $_POST['customer_address'];
			$customer_city = $_POST['customer_city']; 
			$comments = $_POST['comments']; 
			$date = $_POST['date'];
			$commande = $_POST['commande'];
			$list = [];
			foreach ($commande AS $id => $prod)
			{
				if ($prod !== '')
					$list[] = ["id"=>$id, "quantity"=>$prod];
			}
			try
			{
				$delivery = $manager->create($cutomer_name, $customer_tel, $customer_address, $customer_city, $comments, $date, $list);
				header('Location: index.php?page=delivery&id='.$delivery->getId());
				exit;
			}
			catch (Exception $e)
			{
				$error = $e->getMessage();
			}
		}
	}
}