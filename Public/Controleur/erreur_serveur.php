<?php
$this->setCodeErreur($_SESSION['beta']);

$BD = new\PEUNC\BDD;
$this->setTitreErreur($BD->TexteErreur($_SESSION['beta']));

$this->setCorpsErreur("<p>Image &agrave; venir</p>");
