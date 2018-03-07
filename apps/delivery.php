<?php
if (isset($_GET['id']))
{
    $manager = new DeliveryManager($pdo);
    $delivery = $manager->find($_GET['id']);
    require('views/delivery_final.phtml');
}
else
{
    $manager = new ProductsManager($pdo);
    $products = $manager->findAll();
    $manager = new DateManager($pdo);
    $dates = $manager->listDate();
    require('views/delivery.phtml');
}
?>