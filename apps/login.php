<?php

if (empty($_SESSION['id']))
    require('views/login.phtml');
else
    require('views/logout.phtml');