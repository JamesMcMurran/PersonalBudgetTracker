<?php

require_once 'DB.php';

$DB= new \budget\DB();
$txns=$DB->listMovies();


?>
<html>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <body>
        <h1 style="color: #5e9ca0;">Budget Tracking</h1>
        <p>&nbsp;</p>
        <h2 style="color: #2e6c80;">Quick look:</h2>
        <p>Month: November</p>
        <table class="editorDemoTable" style="width: 342px;" border="1">
        <thead>
        <tr>
            <td style="width: 148px;">Type</td>
            <td style="width: 148px;">Category</td>
            <td style="width: 182px;">Amount</td>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 148px;">Monthly Remaining</td>
                <td style="width: 182px;">=1900*2</td>
            </tr>
            <tr>
                <td style="width: 148px;">Bills Paid</td>
                <td style="width: 182px;">Select sum(amount)</td>
            </tr>
            <tr>
                <td style="width: 148px;">Bills remaining</td>
                <td style="width: 182px;">&nbsp;</td>
            </tr>
            <?php
            foreach ($txns as $value){
                echo "
            <tr>
                <td >{$value['type']}</td>
                <td >{$value['category']}</td>
                <td >{$value['amount']}</td>
            </tr>";
            }


            ?>
            <tr>
                <td style="width: 148px;">Other</td>
                <td style="width: 182px;">&nbsp;</td>
            </tr>
        </tbody>
        </table>
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