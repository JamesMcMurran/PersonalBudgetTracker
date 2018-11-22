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

	$DB->insertTransaction($type,$category,$name,$amount,$date);

    var_dump([$type,$category,$name,$amount,$date]);

}else{
    echo 'No data sent';
}