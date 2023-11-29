<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost" ;
    $username = "root" ;
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $IP = $_POST['IP'];
    $Amount = $_POST['Amount'];
    $Payment = $_POST['Pay'];
    $Address = $_POST['address'];

    $sql = "INSERT INTO `payment`.`pay` (`Full Name`, `Phone`, `Aadhar Number`, `Amount`, `Online Payment`, `Address`) VALUES ('$name', '$phone', '$IP', '$Amount', '$Payment', '$Address');";


    if($con->query($sql) == true){
        // echo "Appointment successfully submitted";
        $insert  = true;
    }
    else{
        echo "ERROR:  $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments | Health Care</title>
    
<link rel="stylesheet" href="css/hospital.css">
<link rel="shortcut icon" href="images/Pay_favicon.ico" type="image/x-icon">
</head>
<body>

<?php
        if($insert == true){
            echo "<div class='submit'><p >ThankYou!
            <br>
            Your Payment was received
            
            <style>
            .pay .heading{
                display: none}
            .pay form
                {display: none;}
                </style>";}
    ?>
    
        
    </p></div> 
    <section class="pay" id="pay">

        <div class="container min-vh-100">
    
            <div class="row justify-content-center">
    
                <h1 class="heading"><span>'</span> online payment <span>'</span></h1>
    
                <div class="col-md-10" data-aos="flip-down">
    
                    <form action="pay.php" method="post">
    
                        <div class="inputBox">
                            <input type="text" name="name" placeholder="full name">
                            <input type="number" name="phone" placeholder="phone">
                        </div>
    
                        <div class="inputBox">
                            <input type="number" name="IP" placeholder="Aadhar Number">
                            <input type="number" name="Amount" placeholder="Amount">
                            <input type="text" name="Pay" placeholder="Online payment" >
                        </div>
    
                        <textarea name="address" id="" cols="30" rows="10" placeholder="address"></textarea>
    
                        <input type="submit" name="" id="" value="make payment" class="button">
                        
    
                    </form>
                    


                </div>
    
            </div>
    
        </div>
    
    </section>


    <script src="js/appointment.js"></script>
    
</body>
</html>