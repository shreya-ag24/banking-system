                              <!-- php only  -->

<?php

include 'partials/config.php';


if($_POST){
   
  
    if($_POST["submit"] == "Transfer"){
            //logic
        $amount = $_POST["amount"];
        $receiverId = $_POST["transfer_to"];
        $senderId = $_POST["sender"];


        //check if the sender has balance

            $query = "SELECT * FROM customer WHERE id=$senderId";

            $sql = mysqli_query($conn, $query);

            $senderDetails = mysqli_fetch_assoc($sql);



            if($senderDetails["balance"] > $amount){

                //if yes send it to receiver and increase its balance



                $query = "SELECT * FROM customer WHERE id=$receiverId";

                $sql = mysqli_query($conn, $query);

                $receiverDetails = mysqli_fetch_assoc($sql);

                $final_balance = $receiverDetails["balance"]+$amount;


                $update = "UPDATE customer SET balance=$final_balance WHERE id=$receiverId";

                $sql = mysqli_query($conn, $update);


                 //decrease the balance of current user
                 $final_balance = $senderDetails["balance"] - $amount;
                 
                 $update = "UPDATE customer SET balance=$final_balance WHERE id=$senderId";

                $sql = mysqli_query($conn, $update);



                   //note it in trasaction table


                   $insert = "INSERT INTO transaction SET trans_sender=$senderId , trans_receiver=$receiverId , trans_amount=$amount";

                   $sql = mysqli_query($conn, $insert);


                   
                   if($sql){
                    echo "<script>alert('Transaction Successfull')</script>";
                   }




            }else{


                echo "<script>alert('Insufficent balance')</script>";

            }

            


    }

}


if($_GET){

    $senderId = $_GET["id"];
}




$query = "SELECT * FROM customer";

$sql = mysqli_query($conn, $query);


if (!$sql) {
    die("Empty Results");
}



?>


              <!-- source code  -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/view_user.css">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/background.css">
</head>
<body>
    <!-- navbar  -->
<?php include 'partials/nav.php'; ?>
    <!-- background  -->
<img class="img-fluid" src="img/bank.jpg" style="border: none; ">
<br>
<div class="container">
<h1 class="text-center pt-4" style="font-family:fantasy;">Transfer </h1>
</div >
<br>
<br>
<br>
        <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-header">
        <div class="screen-header-right">
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
          <div class="screen-header-ellipsis"></div>
        </div>
      </div>
      <div class="screen-body">
        <div class="screen-body-item left">
          <img class="img-fluid2" src="img/user.jpg" style="border: none; border-radius: 50%;">
        </div>
        <div class="screen-body-item" style="background-color: #f3efea;">
          
        <form action="transfer.php" method="POST">


            <div class="app-form-group">


                <label for="">Transfer To</label>

                <select name="transfer_to" class="form-select">

                    <option selected>Choose</option>

                    <?php while ($row = mysqli_fetch_assoc($sql)) {  ?>
                        <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                    <?php } ?>
                </select>
              </div>
              <br>
              <div class="app-form-group"></div>


                <label>Amount</label>

                <input class="form-control" name="amount" type="text">

                <input hidden  name="sender" value="<?php echo $senderId ?>">
                    </div>
                        <br>
                <div class="app-form-group">
                <input class="btn btn-primary" name="submit" value="Transfer" type="submit">

            </div>



        </form>
     </div>
     </div>
     </div>
     </div>
     

    </div>



<!-- footer  -->
<?php include 'partials/footer.php'; ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>