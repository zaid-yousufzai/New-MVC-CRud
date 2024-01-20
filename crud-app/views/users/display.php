

<?php
require_once(__DIR__ . '/../../connect.php');
require_once('../../controllers/UserController.php');

$usercontroller =  new UserController($conn);
$users=$usercontroller->getUsers();


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center m-5" >User List</h1>

    <div class="container p-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>


  <tbody>

  <?php foreach($users as $user): ?>
    <tr>
     
      <td><?= $user->getId() ?></td>
      <td><?= $user->getName()  ?></td>
      <td><?= $user->getEmail()  ?></td>

      <td>
        <a href="update.php?id=<?= $user->getId()  ?>" class="btn btn-warning m-1">Update User</a>
        <a href="delete.php?id=<?= $user->getId() ?>" class="btn btn-danger  m-1" onclick="return confirm('Are you sure')">Delete User</a>
      </td>
    </tr>
   <?php endforeach;   ?>
    
  </tbody>
</table>

<a href="create.php" class="btn btn-success my-5">Add User</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  </body>
</html>