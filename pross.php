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

	$DB->insertTransaction($type,$category,$name,$amount);
}else{
    echo 'No data sent';
}