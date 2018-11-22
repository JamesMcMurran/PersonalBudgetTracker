<?php
inclued 'env.php';
if($_POST['PASSWORD']==$_ENV['PASSWORD']){
  $_SESSION['Auth']=1;
}

?>
