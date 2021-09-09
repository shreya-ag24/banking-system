                                         <!-- php only -->

<?php

  include 'partials/config.php';

    // $_POST  


  $userId = $_GET["id"];


  $query = "SELECT * FROM customer WHERE id=$userId";

  $sql = mysqli_query($conn , $query);


  if(!$sql){
    die("No Records Found!");
  }


?>


                   <!-- source code -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAILS</title>
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
    <!-- background -->
<img class="img-fluid" src="img/bank.jpg" style="border: none; ">

        <br>
<h1 class="text-center pt-4" style="font-family:fantasy;">User Details</h1>
        
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
          <!-- <form class="app-form" method="get"> -->

          <?php while( $row = mysqli_fetch_assoc($sql) ){ ?>

            <div class="app-form-group">
            <label for="exampleInputEmail1">Full Name</label>
              <input readonly class="app-form-control" value="<?php echo $row["name"] ?>" type="text" name="name" >
            </div>
            <br>
            <div class="app-form-group">
            <label for="exampleInputEmail1"> Email</label>
              <input readonly class="app-form-control" value="<?php echo $row["email"]?>"  type="email" name="email" >
            </div>
            <br>
            <div class="app-form-group">
            <label for="exampleInputEmail1">Balance</label>
              <input readonly class="app-form-control" value ="<?php echo $row["balance"]?>" type="number" name="balance" >
            </div>
            <br>
            <br>
            

           
            <a href="transfer.php?id=<?php echo $row["id"] ?>"> <button class="btn btn-primary" >Transact</button>  </a>
            <?php } ?>

          <!-- </form> -->
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