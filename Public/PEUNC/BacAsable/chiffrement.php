<?php // test de chiffrement
require"PEUNC/BacAsable/commun.php";

$cipher = "AES-128-CBC";	// le premier de la liste openssl_get_cipher_methods

// j'ai pris le code du manuel php sans tout comprendre
$data = "123";

// chaine créées avec le générateur de MDP de Keepass
$key =",P{4!8GyJ\[b7^#b";
$iv = ">4.ND5\@u>riv8EV";

$resultat = openssl_encrypt($data, $cipher, $key, $options=0, $iv);
$original = openssl_decrypt($resultat, $cipher, $key, $options=0, $iv);

$code = "<p>Algo : " . $cipher . "</p>";
$code .= "<p>clé : " . $key . " de longueur " . strlen($key). "</p>";
$code .= "<p>mesage : " . $data . "</p>";
$code .= "<p>veceur initialisation : " . $iv . " de longueur " . strlen($iv) . "</p>";
$code .= "<p>chiffrement : " . $resultat .  " de longueur " . strlen($resultat) . "</p>";
$code .= "<p>déchiffrement : " . $original . " qui " . ($data == $original ? "est" : "n&apos;est pas") . " identique à l&apos;original</p>";

$this->setSection("\t<h1>Essai de chffrement</h1>\n<p>Algo disponibles :" .$code . "</p>\n");
