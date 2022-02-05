<?php
$this->setCodeErreur($_SESSION["PEUNC"]['beta']);

$BD = new\PEUNC\BDD;
$this->setTitreErreur($BD->TexteErreur($_SESSION["PEUNC"]['beta']));

$this->setCorpsErreur("<p>Image &agrave; venir</p>");
