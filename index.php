<?php
	// will hold all output from various scripts
	$data = [];
	$script_dir = 'scripts';
	 foreach (glob($script_dir. "/*.*") as $myfiles) {
	 // holds all the files inside the script dir
      $files[] = $myfiles;
   }

   foreach ($files as $index => $value) {
   		if(substr($value, -3) == '.js'){
   			// echo "executing " . $value . "...";
   			exec( 'node '.$value, $output, $status );
			if($output == null){
				$member = json_decode($output[0]);
				$member->status = "passed";
				$member = json_encode($member);
				$data[$index] = $member;
				unset($output);
			}else{
				$member = json_decode($output[0]);
				$member->status = "passed";
				$member = json_encode($member);
				$data[$index] = $member;
				unset($output);
			}	
   		}elseif (substr($value, -4) == '.php') {
   			// echo "executing " . $value . "...";
   			exec( 'php '. $value, $output, $status );
			if($output == null){
				echo $value ." Failed";
			}	
			else{
				$member = json_decode($output[0]);
				$member->status = "passed";
				$member = json_encode($member);
				$data[$index] = $member;
				unset($output);
			}
		}elseif (substr($value, -3) == '.py') {
			// echo "executing " . $value . "...";
   			exec( 'python '. $value, $output, $status );
			if($output == null){
				echo $value ." Failed";
			}	
			else{
				$member = json_decode($output[0]);
				$member->status = "passed";
				$member = json_encode($member);
				$data[$index] = $member;
				unset($output);
			}
		}	
   }

  var_dump($data);

?>