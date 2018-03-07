<?php
var_dump($_POST);
$manager = new ProductsManager($pdo);
$products = $manager->findAll();
$manager = new DateManager($pdo);
$dates = $manager->listDate();

$i = 0;

echo '<form method="POST"><select name="date">';
foreach ($dates as $date)
{
    if ($date['conges'] == 0)
    {

        for ($i = 11; $i < 14;$i++)
        {
            echo '<option>'.$date['date'].' '.$i.':00</option>';
        }
        for ($i = 18; $i < 24;$i++)
        {
            echo '<option>'.$date['date'].' '.$i.':00</option>';
        }
    }
    else if ($date['conges'] == 1)
    {
        for ($i = 18; $i < 24;$i++)
        {
            echo '<option>'.$date['date'].' '.$i.':00</option>';
        }
    }
    else if ($date['conges'] == 2)
    {
        for ($i = 11; $i < 14;$i++)
        {
            echo '<option>'.$date['date'].' '.$i.':00</option>';
        }
    }

}
echo '</select><button type="submit">Test</button></form>';




require('views/delivery.phtml');

?>