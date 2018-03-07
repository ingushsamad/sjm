<?php
//            var_dump($_POST);
if (isset($_POST['action']))
{
	
	if ($action == 'booking')
	{
		$manager = new BookingManager($pdo);
		$action = $_POST['action'];
		if (isset($_POST['customer_name'], $_POST['customer_tel'], $_POST['customer_address'], $_POST['customer_city'], $_POST['comments'], $_POST['date'],$_POST['product_id'] ))
		{
           $cutomer_name = $_POST['customer_name'];
           $customer_tel = $_POST['customer_tel'];
           $customer_address = $_POST['customer_address'];
           $customer_city = $_POST['customer_city']; 
           $comments = $_POST['comments']; 
           $date = $_POST['date'];
           $product_id = $_POST['product_id'];

			
			$delivery = $manager->create($cutomer_name, $customer_tel, $customer_address, $customer_city, $comments, $date, $product_id);
			// $sql = "INSERT INTO articles (title, content, image, author) VALUES('".$title."', '".$content."', '".$image."', '".$author."')";
			// mysqli_query($db, $sql);
		}
	}
}