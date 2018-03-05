<?php

$manager = new CategoryManager($pdo);
$categories = $manager->findAll();

foreach ($categories as $category)
{
	$products = $category->getProducts();
	if (sizeof($products) > 0)
		require('views/carte.phtml');
}
?>