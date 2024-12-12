<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    require_once 'dbconnection.inc.php';
    require_once 'functions.inc.php';

    //check empty  fields
    if(emptyInputSignup($username,$email,$password,$confirm_password) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
   
    if(invalidUsername($username)!==false){
        header("location: ../signup.php?error=invalid_username");
        exit();
    }
    if(invalidEmail($email)!==false){
        header("location: ../signup.php?error=invalid email");
        exit();
    }
    if (passwordMatch($password,$confirm_password)!==false){
        header("location: ../signup.php?error=password_dont_match");
        exit();
    }
    if(userExists($conn,$username,$email)){
        header("location: ../signup.php?error=username_taken");
        exit();
    }
    createUser($conn,$username,$email,$password);
}
else{
    header("location:../signup.php");
}