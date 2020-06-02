<?php
	$data = [];
	$script_dir = 'scripts';
	 foreach (glob($script_dir. "/*.*") as $myfiles) {
      $files[] = $myfiles;
   }

   foreach ($files as $index => $value) {
   		if(substr($value, -3) == '.js'){
   			// echo "executing " . $value . "...";
   			exec( 'node '.$value, $output, $status );
			if($output == null){
				echo "\n Failed \n \n";
			}else{
				$data[$index] = $output[0];
				unset($output);
			}	
   		}elseif (substr($value, -4) == '.php') {
   			// echo "executing " . $value . "...";
   			exec( 'php '. $value, $output, $status );
			if($output == null){
				echo "\n Failed \n \n";
			}	
			else{
				$data[$index] = json_encode($output[0]);
				unset($output);
			}
		}elseif (substr($value, -3) == '.py') {
			// echo "executing " . $value . "...";
   			exec( 'python '. $value, $output, $status );
			if($output == null){
				echo "\n Failed \n \n";
			}	
			else{
				$data[$index] = $output[0];;
				unset($output);
			}
		}	
   }

  var_dump(json_encode($data));

?>