<?php
/*
// Task 2 Solution by Airondev
// Member of Team-Storm

*/
	// will hold all output from various scripts
	$data = [];
	$script_dir = 'scripts';
	 foreach (glob($script_dir. "/*.*") as $myfiles) {
	 // holds all the files inside the script dir
      $files[] = $myfiles;
   }
   $totalScripts = 0;
   $totalPassed = 0;
   foreach ($files as $index => $value) {
        $totalScripts++;
   		if(substr($value, -3) == '.js'){
   			// echo "executing " . $value . "...";
   			exec( 'node '.$value, $output, $status );
			if($output == null){
                $data[$index] = json_encode(['file' => $value, 'output' => 'Test failed please follow guidlines', 'status' => 'failed']);
				unset($output);
			}else{
				$member = json_decode($output[0]);
				$member->status = "passed";
                $data[$index] = json_encode($member);
                $totalPassed++;
				unset($output);
			}	
   		}elseif (substr($value, -4) == '.php') {
   			// echo "executing " . $value . "...";
   			exec( 'php '. $value, $output, $status );
			if($output == null){
                $data[$index] = json_encode(['file' => $value, 'output' => 'Test failed please follow guidlines', 'status' => 'failed']);
				unset($output);
			}	
			else{
				$member = json_decode($output[0]);
                $member->status = "passed";
                $data[$index] = json_encode($member);
                $totalPassed++;
                unset($output);
			}
		}elseif (substr($value, -3) == '.py') {
			// echo "executing " . $value . "...";
   			exec( 'python '. $value, $output, $status );
			if($output == null){
                $data[$index] = json_encode(['file' => $value, 'output' => 'Test failed please follow guidlines', 'status' => 'failed']);
				unset($output);
			}	
			else{
				$member = json_decode($output[0]);
                $member->status = "passed";
                $data[$index] = json_encode($member);
                $totalPassed++;
                unset($output);
			}
		}	
   }

    $members = [];
    $passedData = [];
    $failedData = [];

  foreach($data as $key => $value){
	  $members[$key] = json_decode($value, true); //this gives us an array
      $passedData[$key] = json_decode($value, true); //this gives us an array
  }
// var_dump($members);
 

  if ($_SERVER['QUERY_STRING'] === 'json') {
    header('Content-Type: application/json');
    foreach ($passedData as $key => $value) {
        if ($value['status'] === 'passed') {
           $pass[$key] = $value;
        }
      
    }
    $pass = json_encode($pass);
    echo $pass;
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf">
        <title>hngi7_task1</title>  

        <!-- CSS Framework/Misc -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate/animate.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
    </head>

<body class='container'>
    <header class="">
        <nav class="navbar navbar-light bg-light justify-content-between bg-dark text-light">
            <a class="navbar-brand">Team Air</a>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
    </header>
    <main class= 'main'>
        <section class="bg-gradient-secondary">
            <div class="m-4 row ">
                <div class="col-md-4 list-group-item">Total Submission: <span class="badge badge-primary badge-pill ml-3"><?=$totalScripts?></span></div>
                <div class="col-md-4 list-group-item">Passed:<span class="badge badge-primary badge-pill ml-3"><?=$totalPassed?></span></div>
                <div class="col-md-4 list-group-item">Failed: <span class="badge badge-primary badge-pill ml-3"><?=$totalScripts - $totalPassed?></span></div>
            </div>
        </section>
        <section>
            <table>
                <thead class="text-light bg-secondary">
                    <tr>
                        <th class="w-1/6 px-4 py-2">Script</th>
                        <th class="w-1/6 px-4 py-2">HNG ID</th>
                        <th class="w-1/6 px-4 py-2">Name</th>
                        <th class="w-1/2 px-4 py-2">Message</th>
                        <th class="w-1/6 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- use bg-green-500 class for passed -->
                    <?php foreach ($members as $key => $value): ?>
                        <?php if ($value['status'] === 'passed'):  $passedData = 1 ?>
                            <tr class="bg-">
                                <td class="border px-4 py-2"><?=$value['file']?></td>
                                <td class="border px-4 py-2"><?=$value['id']?></td>
                                <td class="border px-4 py-2"><?=$value['name']?></td>
                                <td class="border px-4 py-2"><?=$value['output']?></td>
                                <td class="border px-4 py-2"><?=$value['status']?></td>
                            </tr>
                         <?php elseif ($value['status'] === 'failed'): ?>
                            <tr class="bg-warning">
                                <td class="border px-4 py-2"><?=$value['file']?></td>
                                <td class="border px-4 py-2"><?=$value['id']?></td>
                                <td class="border px-4 py-2"><?=$value['name']?></td>
                                <td class="border px-4 py-2"><?=$value['output']?></td>
                                <td class="border px-4 py-2"><?=$value['status']?></td>
                            </tr>
                        <?php endif;?>
                </tbody>
            <?php endforeach;?>
            </table>
        </section>
    </main>
</body>

</html>