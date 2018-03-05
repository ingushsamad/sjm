<?php

$manager = new CategoryManager($pdo);
$categorys = $manager->findAll();

foreach ($categorys as $category)
	require('views/carte.phtml');
?>