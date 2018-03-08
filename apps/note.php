<?php

$i = 0;

while ($i < 5)
{
    if ($i < $comment->getNote())
        require('views/staryellow.phtml');
    else
        require('views/starblack.phtml');
    $i++;
}