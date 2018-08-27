<?php
function Gérer_cache($cache, $durée, $script){
	$cache = 'Vue/cache/'.$cache.'.cache';
	if(file_exists($cache) && (time() - filemtime($cache) < $durée * 3600))
		readfile($cache);
	else {
		ob_start();
		include 'Vue/'.$script.'.php';
		echo '<!-- cache généré le ', date("d/m/Y \à H:i"),' -->', "\n";
		$code = ob_get_contents();
		ob_end_clean();
		file_put_contents($cache, $code);
		echo $code;
	}
}
