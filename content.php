<?php
		if(!file_exists($mod.'.php')) {
			echo "Page not found";
		} else {
			include $mod.'.php';
		}
?>