<?php

include('connection/db.php');

 $category=$_POST['category'];
 $Description=$_POST['Description'];
 



$query =mysqli_query($conn,"insert into job_category(category,des)values('$category','$Description')");
// var_dump($query);
if($query){
echo " Data has been inserted successflly";
}else{
    echo "Some error happened, please try again";
}
?> 