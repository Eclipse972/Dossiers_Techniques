<?php
$this->setCodeErreur($this->beta);

$BD = new\PEUNC\BDD;
$this->setTitreErreur($BD->TexteErreur($this->beta));

$this->setCorpsErreur("<p>Image &agrave; venir</p>");
