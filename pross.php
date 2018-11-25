<?php

require_once 'DB.php';

//check Auth

//Check post

if(!empty($_POST['category'])){
	$DB= new \budget\DB();

	$type = $_POST['type'];
	$category = $_POST['category'];
	$name = $_POST['name'];
	$amount = $_POST['amount'];
    $date = $_POST['date'];
    $recurring = $_POST['recurring'];
    $notes = $_POST['notes'];

	$DB->insertTransaction($type,$category,$name,$amount,$date,$recurring,$notes);

    var_dump([$type,$category,$name,$amount,$date,$recurring,$notes]);

}else{
    echo 'No data sent';
}