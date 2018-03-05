<?php

$manager = new ProductsManager($pdo);
$products = $manager->findByCategoryId($category->getId());

foreach ($products as $product)
    require('views/products.phtml');

?>