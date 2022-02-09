<?php
global $BD;
$this->setCodeErreur($this->beta);

$this->setTitreErreur($BD->TexteErreur($this->beta));

$this->setCorpsErreur("<p>Image &agrave; venir</p>");
