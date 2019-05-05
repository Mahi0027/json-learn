<?php
	if(isset($_GET['x']) && !empty($_GET['x'])){
		//$phpdata=$_GET['x'];
		//echo $phpdata;

		$xx=json_decode($_GET['x']);
		foreach($xx as $key=>$value){
			echo '<br>'.$key.' : ';
			foreach ($value as $key1 => $value1) {
				echo $value1." , ";
				if(sizeof($value1)>1){
					foreach ($value1 as $key2 => $value2) {
						echo '<br>'.$key2.' : ';
						foreach ($value2 as $key3 => $value3) {
							echo $value3.' , ';
						}
					}
				}
			}
		}
	}