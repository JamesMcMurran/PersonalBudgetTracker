<?php

require_once 'DB.php';

$DB= new \budget\DB();
$txns=$DB->listTransactions();

$MonthlyBudgets = getenv('MonthlyBudgets');
$Total=array();

?>
<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <body>
        <h1 style="color: #5e9ca0;">Budget Tracking</h1>
        <p>&nbsp;</p>
        <h2>Quick look:</h2>
        <p>Month: November</p>
        <table class="editorDemoTable" border="1">
        <thead>
            <tr>
                <td>Type</td>
                <td>Category</td>
                <td>Amount</td>
            </tr>
        </thead>
            <?php
            foreach ($txns as $value){

                if(isset($Total[$value->type])){
                    $Total[$value->type]+=$value->amount;
                }else{
                    $Total[$value->type]=$value->amount;
                }

                echo "
            <tr>
                <td >{$value->type}</td>
                <td >{$value->category}</td>
                <td >{$value->amount}</td>
            </tr>";

                if(isset($MonthlyBudgets[$value->type][$value->category])){
                    $remaining = $MonthlyBudgets[$value->type][$value->category] - $value->amount;
                    echo "
                    <tr>
                        <td >{$value->type} Remaining</td>
                        <td >{$value->category} Remaining</td>
                        <td >{$remaining}</td>
                    </tr>";

                }
            }

            echo"
            <tr>
                <td >---</td>
                <td >---</td>
                <td >---</td>
            </tr>";

            $allTotal = 0;
            foreach ($Total as $key=>$value){
                $allTotal += $value;
                echo "
            <tr>
                <td >{$key}</td>
                <td > </td>
                <td >{$value}</td>
            </tr>";
            }


            echo"
            <tr>
                <td >---</td>
                <td >---</td>
                <td >---</td>
            </tr>
            <tr>
                <td >Total</td>
                <td > </td>
                <td >{$allTotal}</td>
            </tr>";
?>
        </tbody>
        </table>
        <br />
        <br />
        <p><strong>&nbsp;Add Item</strong></p>

        <form action="pross.php" method="post">
            <select name="type" id="type">
                <option value="Bill">Bill</option>
                <option value="Food">Food</option>
                <option value="Other">Other</option>
            </select>

            <br />

            <p>Category <br /> <input name="category" id="category" type="text" /></p>
            <p>Name     <br /> <input name="name"     id="name"     type="text" /></p>
            <p>Amount   <br /> <input name="amount"   id="amount"   type="text" /></p>
            <p>Date     <br /> <input name="date"     id="date"     type="date" /></p>

            <input type="submit" value="Submit">

        </form>
        <p>
            <strong>Bill&nbsp;- Gas Electric Loan Water Medical<br />
                Food - Groshires Restaurant&nbsp;</strong>
        </p>
    </body>
</html>
