<?php

include('connection/db.php');

 $Company=$_POST['Company'];
 $Description=$_POST['Description'];
 
 $admin=$_POST['admin'];


$query =mysqli_query($conn,"insert into company(company,des,admin)values('$Company','$Description','$admin')");
// var_dump($query);
if($query){
echo " Data has been inserted successflly";
}else{
    echo "Some error happened, please try again";
}
?> 