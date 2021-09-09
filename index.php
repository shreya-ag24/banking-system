<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Sparks Foundation</title>
       <!-- CSS only -->
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/background.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

</head
>
<body>
     <!-- navbar  -->
<?php include 'partials/nav.php'; ?>
     <!-- background  -->
<img class="img-fluid" src="img/bank.jpg" style="border: none; ">
    
    <div class="container">
        <h1 class="text" style="font-family:serif; font-weight:bold;"><b><strong>THE SPARKS FOUNDATION BANK</strong></b></h1>
        
       
    </div>


    <div class="row">
  <div class="column" id="a">
    <a href="transfermoney.php"><img src="img/view.png" alt="Image of User" style="width:50%"></a>
    <h2><b>View User Details</b></h2>
  </div>
  <div class="column" id="b">
    <a href="transfermoney.php"><img src="img/transfer.jpg" alt="Image of transfering Money" style="width:60%"></a>
    <h2><b>Transfer Money</b></h2>
  </div>
  <div class="column" id="c">
    <a href="transhistory.php"><img src="img/history.jpg" alt="Image of transaction history" style="width:50%"></a>
    <h2><b>Transaction History</b></h2>
  </div>
</div>


<!-- footer  -->
<?php include 'partials/footer.php'; ?>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>