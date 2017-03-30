<?php

    $con = mysqli_connect("mysql10.000webhost.com", "a3288368_user", "abcd1234", "a3288368_data");

    

    $cust_name = $_POST["cust_name"];

    $username = $_POST["username"];

    $password = $_POST["password"];

     $tel_no = $_POST["tel_no"];

      $email = $_POST["email"];

       //yahan check lgega username ka
$query = mysqli_query("SELECT username FROM tablename WHERE username='$username' ") or die ("Could not search");
    $count = mysqli_num_rows($query);
    
    if($count != 0){
      $output = "the user already exists!"; //ye cheez android app k andr kese show hogi ye abi nahi pata

    }else{


    $statement = mysqli_prepare($con, "INSERT INTO customer (cust_name, username, tel_no, email, password) VALUES (?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($statement, "siss", $cust_name, $username, $tel_no, $password, $email);

    mysqli_stmt_execute($statement);

    

    $response = array();

    $response["success"] = true;  

    

    echo json_encode($response);}

?>