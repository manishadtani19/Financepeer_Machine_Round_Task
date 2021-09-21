<?php

include 'config.php';

$sql="select * from uploaded_files order by id desc";
$res=mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<table class="table table-dark table-hover">
  <thead>
    <tr>
      <!-- <th scope = "col">Sno.</th> -->
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">File Name</th>
    </tr>
  </thead>
  <tbody>
  <?php 
		$i=1;
		while($row=mysqli_fetch_assoc($res)){?>
    <tr>
      <!-- <th scope="row">1</th> -->
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['username']?></td>
      <td><?php echo $row['name']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>