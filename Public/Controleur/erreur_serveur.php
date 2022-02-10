<?php
global $BD;
$this->setTitle("Les dossiers techniques de ChristopHe");
$this->setHeaderText("<p class=\"font-effect-outline\">Les dossiers techniques de ChristopHe version test</p>");
$this->setLogo("logo.png");
$this->setFooter("");
$this->setView("erreur.html");
$this->setCSS(array("erreur"));

$this->setCodeErreur($this->beta);

$this->setTitreErreur($BD->TexteErreur($this->beta));

$this->setCorpsErreur("<p>Image &agrave; venir</p>");
