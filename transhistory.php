                                               <!-- php only -->
<?php
include 'partials/config.php';

// CRUD - CREATE READ UPDATE DELETE

$query = "SELECT * FROM transaction";

$sql = mysqli_query($conn , $query);


if(!$sql){
     die("Empty Results");
}
?>


                                    <!-- source code -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION HISTORY</title>
  
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/background.css">
</head>
<body>
    <!-- navbar  -->
<?php include 'partials/nav.php'; ?>

     <!-- background -->
<img class="img-fluid" src="img/bank.jpg" style="border: none; ">

<div class="container">
  <br>
        <h2 class="text-center pt-4" style="font-family:fantasy;">Transaction History</h2>
        
       <br>
       <br>
    
</div >
<!-- table  -->
<div class="container">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">S. No.</th>
      <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Amount_Transfered</th>
      <th scope="col">Date and Time</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_assoc($sql)) {  ?>

<tr>

<?php
    
    $senderId =$row['trans_sender'];
    
    $query1 = "SELECT * FROM customer WHERE id=$senderId";

    $sql1 = mysqli_query($conn , $query1);

    $sender = mysqli_fetch_assoc($sql1);


    $receiverId = $row['trans_receiver'];
    
    $query2 = "SELECT * FROM customer WHERE id=$receiverId";

    $sql2 = mysqli_query($conn , $query2);

    $receiver = mysqli_fetch_assoc($sql2)
    
    
    ?>

        <td><?php echo $row["trans_id"]  ?></td>
        <td><?php echo $sender["name"]  ?></td>
        <td><?php echo $receiver["name"]  ?></td>
        <td><?php echo $row["trans_amount"]  ?></td>
        <td><?php echo $row["date"]  ?></td>
        
</tr>

<?php  } ?>
  </tbody>
    </table>

</div>



<!-- footer  -->
<?php include 'partials/footer.php'; ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>