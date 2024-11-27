<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style type="text/css">
        button, input[type="submit"], input[type="reset"] {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>
</head>
<body>
    <center>
        <section class="content">
            <h1>Bhai Fancy Store</h1>
            Tindhara, Banepa
            <h1 class="page-header"><u>INVOICE</u></h1>
            Name:
            <?php
                if(isset($_SESSION['user'])){
                    echo $user['firstname'].' '.$user['lastname'];
                }
            ?>
            <br>
            Payment Method: Cash on Delivery
            <br>
            Delivery Charge: Free
            <br>
            <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                    <th></th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="20%">Quantity</th>
                    <th>Subtotal</th>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
            <br>
            Thank you for shopping with us.
            <br>
            We hope to see you again.
            <h2>Click here to pay through Esewa:</h2>
            <img src="qr.jpg" height="200px" width="200px">
        </section>
        <a href='sales.php' style='display: inline-block; background:#d14b1b; color: #fff; padding: 8px 30px; margin: 30px 0; border-radius: 30px; transition: background 0.5s;'>Done</a><br>
        <a href="index.php">&#8592 Back to Homepage</a>
    </center>
</body>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
    getDetails();
    getTotal();
});

function getDetails(){
    $.ajax({
        type: 'POST',
        url: 'cart_details.php',
        dataType: 'json',
        success: function(response){
            $('#tbody').html(response);
            getCart();
        }
    });
}

function getTotal(){
    $.ajax({
        type: 'POST',
        url: 'cart_total.php',
        dataType: 'json',
        success:function(response){
            total = response;
        }
    });
}
</script>
</html>