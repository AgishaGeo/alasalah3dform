<?php
$clientname=$_POST['cname'];
$clientid=$_POST['cid'];
$phone=$_POST['phone'];
// $rating=$_POST['ratingValue'];
$feedback=$_POST['feedback'];

// if(!empty($clientname) || !empty($clientid) || !empty($phone) || !empty($rating)){
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="formdata";

    //create connection
    $conn= new mysqli_connect($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
        // $SELECT ="SELECT * from feedbackdata where clientinstaid=?" ;
        $INSERT = "INSERT Into feedbackdata(clientinstaid, clientname, phonenumber, rating, feedback) values(?,?,?,?,?) ";
        // $stmt=$conn->prepare($SELECT);
        // $stmt->bind_param("s",$clientid);
        // $stmt->execute();
        // $stmt->bind_result($clientid);
        // $stmt->store_result();
        // $rnum=$stmt->num_rows;

        // if($rnum==0){
            // $stmt->close();
            
            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("ssiis", $clientid,$clientname,$phone,$rating,$feedback);
            $stmt->execute();
            echo "Feedback Posted Successfully";
            
        // }
        // else{
        //     echo "Client Feedback already given with same id";
        // }
        // $stmt->close();
        $conn->close();
    }
// }
// else{
//     echo "Some fields are required";
//     die();
// }
?>