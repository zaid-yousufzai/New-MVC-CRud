

<?php
require_once(__DIR__ . '/../../connect.php');
require_once('../../controllers/UserController.php');

$usercontroller =  new UserController($conn);

if($_SERVER['REQUEST_METHOD']==='POST')
{
    $name=$_POST['name'];
    $email=$_POST['email'];

    if(!empty($name) && !empty($email))
    {
        $usercontroller->createUser($name,$email);
        header('Location: display.php');
        exit();
    }

    else{
        
        echo "<h3 class='error bg-danger text-light p-1 text-center'>Both are Required</h3>";
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




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   
  function validateFields()
  {
    $(".error").hide();
    if($("#name").val()==="" && $("#email").val()==="")
  {
    $('.error').text("Both are Required");
    $(".error").show();
  }

  else if($("#name").val()==="")
  {
    $('.error').text("Name is also Required");
    $(".error").show();
  }

  else if($("#email").val()==="")
  {
    $('.error').text("Email is also Required");
    $(".error").show();
  }

  else{
    $(".error").hide();
  }
  }

  $(".form-control").keyup(function()
  {
    validateFields();
  })
});
</script>







  </head>
  <body>
    <h1 class="text-center m-5" >Create Users</h1>

    <div class="container p-5">

    <form method="post" >

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name">
   
  </div>


  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>


  <button type="submit" class="btn btn-primary">Create User</button>


</form>

<a href="display.php" class="btn btn-primary my-5" >Display List</a>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>