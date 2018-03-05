<?php

$manager = new CategoryManager($pdo);
$categorys = $manager->findAllNotEmpty();

foreach ($categorys as $category)
	require('views/carte.phtml');
?>