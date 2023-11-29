<?php
$insert = false;
if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['time'])){
    $server = "localhost" ;
    $username = "root" ;
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `appointment`.`appointment` (`Name`, `Phone`, `Email`, `Time`, `Message`) VALUES ( '$name', '$phone', '$email', '$time', '$message');";


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
    <title>Document</title>
    
<link rel="stylesheet" href="css/hospital.css">
</head>
<body>

<?php
        if($insert == true){
            echo "<div class='submit'><p >Congratulations!
            <br>
            Your appointment is booked successfully.
            
            <style>
            .contact .heading{
                display: none}
            .contact form
                {display: none;}
                </style>";}
    ?>

    <section class="contact" id="contact">

        <div class="container min-vh-100">
    
            <div class="row justify-content-center">
    
                <h1 class="heading"><span>'</span> make an appointment <span>'</span></h1>
    
                <div class="col-md-10" data-aos="flip-down">
    
                    <form action="appointment.php" method="post">
    
                        <div class="inputBox">
                            <input  type="text" name="name" placeholder="full name">
                            <input  type="number" name="phone" placeholder="phone">
                        </div>
                        
                 
    
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="your email">
                            <input type="text" name="time" placeholder="Timing">
                        </div>
    
                        <textarea name="message" id="" cols="30" rows="10" placeholder="message ( optional )"></textarea>
    
                        <input type="submit" name="" id="" value="make appointment" class="button">
         
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
    </section>

    <script src="js/appointment.js"></script>

    
    
</body>
</html>
