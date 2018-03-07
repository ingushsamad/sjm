<?php

var_dump($_POST);
if (isset($_POST['action']))
{
	if ($_POST['action'] == 'booking')
	{
		$manager = new BookingManager($pdo);
		if (isset($_POST['customer_name'], $_POST['customer_tel'], $_POST['date']))
		{
			$cutomer_name = $_POST['customer_name'];
			$customer_tel = $_POST['customer_tel'];
			$comments = $_POST['comments']; 
			$date = $_POST['date'];
							
			$delivery = $manager->create($cutomer_name, $customer_tel, $comments, $date);
			
			header('Location: index.php');
			exit;

		}
		
	}
}