

<?php
require_once(__DIR__ . '/../../connect.php');
require_once('../../controllers/UserController.php');

$usercontroller =  new UserController($conn);

$userId=isset($_GET['id']) ? $_GET['id'] : null;

if($userId===null)
{
    echo "<h3 class='error bg-danger text-light p-1 text-center'>User Id is Missing</h3>";
    exit();

}

$user=$usercontroller->getUserById($userId);

if(!$user)
{
    echo "<h3 class='error bg-danger text-light p-1 text-center'>User Not Found</h3>";
    exit();
}


if($_SERVER['REQUEST_METHOD']==='POST')
{
    $userId=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];

    if(!empty($userId) && !empty($name) && !empty($email))
    {
        $usercontroller->updateUser($userId,$name,$email);
        header('Location: display.php');
        exit();
    }

    else{
        echo "<h3 class='error bg-danger text-light p-1 text-center'>Name and Email are Required</h3>";
    }
}





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
    <h1 class="text-center m-5" >Update User</h1>

    <div class="container p-5">

    <form method="post" >


    <div class="mb-3">
    
    <input type="hidden" class="form-control" name="id" value="<?= $user->getId()   ?>">
   
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= $user->getName()   ?>">
   
  </div>


  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email"  value="<?= $user->getEmail()   ?>">
  </div>


  <button type="submit" class="btn btn-primary">Update User</button>


</form>

<a href="display.php" class="btn btn-primary my-5" >Display List</a>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>