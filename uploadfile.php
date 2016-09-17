<?php
	$count = 0;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		foreach($_FILES['files']['name'] as $i => $name){
		    if(strlen($_FILES['files']['name'][$i]) > 1){
		        if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $_POST['loc'].$name)){
		            $count++;
		        }
		    }
		}
	}
?>