<?php

if(isset($_POST['login'])){
    $email = "";
    $passkey = "";
    if(isset($_POST["email"])){
    $email = $_POST['email'];
    }else{
        $email_msg = "Email Field is required";
    }

    if(isset($_POST["passkey"])){
        $passkey = $_POST['passkey'];
    }else{
        $passkey_msg = "Password field is required";
    }


    if(isset($_POST["email"]) && isset($_POST["passkey"])){
        $query = "select * from ma_user where email= '{$email}'";
        // echo $query;
        //db connection 1.host 2. user 3. password 4. database_name
        $connect = mysqli_connect("localhost", "root", "", "movie_archive_db");

        // to execute sql query
        $response = mysqli_query($connect, $query);


        // print_r($response);
        $result = array();

        // fetching data from database
        if(mysqli_num_rows($response) > 0){
            while($data = mysqli_fetch_array($response))
            {
                $result[] = [
                    "email" => $data["email"],
                    "passkey_encrypt" => $data["passkey_encrypt"]
                ];
            }
        }
        // checking password i.e plain text and hash password
        if(password_verify($passkey, $result[0]['passkey_encrypt']) &&
        $email = $result[0]['email']) {
            header('location: home.php?msg=success');
        } else {
            header('location: login.php?msg=fail');
        }
        echo "Email : {$result[0]['email']}";
        echo "<br/>";
        echo "Password : {$result[0]['passkey_encrypt']}";
        //to execute sql query
        
        
    }


}


?>