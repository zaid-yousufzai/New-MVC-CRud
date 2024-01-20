<?php 
require_once('../../controllers/UserController.php');
require_once('../../connect.php');

$userController = new UserController($conn); 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Check if the user exists before attempting to delete
        $user = $userController->getUserById($userId);

        if ($user) {
            $userController->deleteUser($userId);
            header('Location: display.php');
            exit();
        } 
        else {
            echo 'User not found.';
        }
    } 
    
    
    else {
        echo 'User ID is missing.';
    }
} 


else {
    echo 'Invalid request method.';
}




?>