<?php

$manager = new DateManager($pdo);
$dates = $manager->listDate();

require('views/booking.phtml');
?>