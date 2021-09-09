                                <!-- php only -->
<?php
include 'partials/config.php';
  //explain what do we neeed

// CRUD - CREATE READ UPDATE DELETE

$query = "SELECT * FROM customer";

$sql = mysqli_query($conn , $query);


if(!$sql){
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
    <title>The Sparks Foundation</title>
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
    <!-- background  -->
<img class="img-fluid" src="img/bank.jpg" style="border: none; ">

<div class="container">
<h2 class="text-center pt-4" style="font-family:fantasy;">Transfer and View</h2>
</div >
<!-- table  -->
<div class="container">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Operation</th>
      <th scope="col">User Details</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_assoc($sql)) {  ?>

<tr>


        <td><?php echo $row["id"]  ?></td>
        <td><?php echo $row["name"]  ?></td>
        <td> <a href="transfer.php?id=<?php echo $row["id"]?>"> <button class="btn btn-primary" >Transact</button>  </a> </td>
        <td> <a href="view_user.php?id=<?php echo $row["id"]  ?>"> <button class="btn btn-primary" >View User</button>  </a> </td>


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