<?php
// Example  scripts in PHP
	$favur_info = [
		"file" => "favur_04819.php", 
		"name" => "Favour Gimn",  
		'message' => 'Hello World, this  is Esi FiDannch with HNGi7 ID  HNG-04819 using Javascript for stage 2 task', 
		'id' => "HNG-04819", 
		'email' => "favurh@mail.com", 
		'language' => "PHP", 
		'status' => "" ];  //Backend dev should have a way of modifying the status key after exec

	$data = json_encode($favur_info);
	echo $data;
?>