<?php
function emptyInputSignup($username,$email,$password,$confirm_password){
    $result;
    if(empty($username)|| empty($email)||empty($password)||empty($confirm_password)){
        $result = true;
    }
    else{
        $result =false;
    }
    return $result;
}
function invalidUsername($username){
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result; 
}
function invalidEmail($email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function passwordMatch($password,$confirm_password){
    $result;
    if($password!==$confirm_password){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function userExists($conn, $username, $email) {
    // Query to check if the username or email exists
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    
    // Initialize the statement
    $stmt = mysqli_stmt_init($conn);
    
    // Check if the statement is prepared successfully
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Redirect to the signup page if preparation fails
        header("location: ../signup.php?error=stmt_failed");
        exit();
    }
    
    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Get the result of the statement
    $resultData = mysqli_stmt_get_result($stmt);
    
    // Check if a row exists
    if ($row = mysqli_fetch_assoc($resultData)) {
        // Return the row if found
        return $row;
    } else {
        // Return false if no matching record is found
        return false;
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password) {
    // SQL query to insert a new user
    try{
        $sql = "INSERT INTO users(username, password, email) VALUES (?, ?, ?);";
           // Initialize the prepared statement
    $stmt = mysqli_stmt_init($conn);
    }
    catch(mysqli_sql_exception){
        header("location: ../signup.php?error=stmt_failed");
        exit();        
    }
    
    
 
    
    // Check if the statement preparation failed
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // Redirect to signup page with an error
        header("location: ../signup.php?error=stmt_failed");
        exit();
    }    
    // Hash the password for secure storage
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Bind the parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $email);
    
    // Execute the statement
    mysqli_stmt_execute($stmt);
    
    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Redirect to the signup page with success
    header("location: ../signup.php?error=none");
    exit();
}
function emptyInputloginup($username,$password){
    $result;
    if(empty($username)|| empty($password)){
        $result = true;
    }
    else{
        $result =false;
    }
    return $result;   
}
function loginUser($conn,$username,$password){
    $userExists = userExists($conn,$username,$username);
    if($userExists === false){
        header("location: ../login.php?error=user_dont_exist");
        exit();
    }
    $password_hashed =$userExists["password"];
    $checkpassword = password_verify($password,$password_hashed);
    if($checkpassword === false){
        header("location: ../login.php?error=wrong_credentials");
        exit();
    }
    elseif($checkpassword === true){
        session_start();
        $_SESSION["userid"]=$userExists["id"];
        $_SESSION["uername"]=$userExists["username"];
        header("location: dashboard.php?error=success");
        exit();        
    }
}