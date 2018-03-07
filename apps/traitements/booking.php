<?php

if (isset($_POST['action']))
{
	if ($_POST['action'] == 'booking')
	{
		$manager = new BookingManager($pdo);
		if (isset($_POST['customer_name'], $_POST['customer_tel'], $_POST['date'], $_POST['nbr']))
		{
			$cutomer_name = $_POST['customer_name'];
			$customer_tel = $_POST['customer_tel'];
			$comments = $_POST['comments']; 
			$date = $_POST['date'];
			$nbr = $_POST['nbr'];

			$delivery = $manager->create($cutomer_name, $customer_tel, $comments, $date, $nbr);
			
			header('Location: index.php');
			exit;

		}
		
	}
}