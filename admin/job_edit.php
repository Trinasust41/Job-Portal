<?php
include('include/header.php');
include('include/sidebar.php');
?>

<?php
include('connection/db.php');
echo $edit=$_GET['edit'];
$query=mysqli_query($conn,"select * from all_jobs where job_id='$edit'");

while($row=mysqli_fetch_array($query)){
$Title=$row['job_title'];
$Description=$row['des'];
$country=$row['country'];
$state=$row['state'];
$City=$row['city'];
$category=$row['category'];
$Keyword=$row['keyword'];
}
?>

<?php
 $query1=mysqli_query($conn,"select * from job_category");
?>




        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


        <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="job_create.php">All Job List</a></li>
    <li class="breadcrumb-item"><a href="#">Add Job</a></li>
   
  </ol>
</nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Job</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <!-- <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button> -->
              </div>
             <!-- <a class="btn btn-primary" href="add_customer.php">Add Customer</a> -->
            </div>
          </div>
         

          <div style="width: 60%; margin-left: 20%; background-color:#F2F4F4;">

        

          <form action="" method="post" style="margin:3% ; padding:3%" name="job_form" id="job_form">

          <div id="msg">

        </div>
              <div class="form-group">
               <label for="Customer Email">Job Title</label>
             
              <input type="text" value="<?php echo $Title;  ?>" name="job_title" id="job_title"class="form-control" placeholder="Enter Job Title ">
             </div>

         
             <div class="form-group">
               <label for="Customer Username">Description</label>
               <textarea name="Description" id="Description" class="form-control"cols="30" rows="10">

               <?php
               echo $Description;
               ?>
               </textarea>
             </div>

             <div class="form-group">
               <label for="Customer Username">Enter Keyword</label>
              <input type="text" value="<?php echo $Keyword;  ?>" class="form-control" name="Keyword" id="Keyword" placeholder="Enter Keyword">
             </div>



             <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit'];?>">
            <div class="form-group">
          <label for="">
          Country
          </label>
  


          <select name="country" class="countries form-control" value=" <?php
               echo $country;
               ?>" id="countryId">
    <option value="">Select Country</option>
</select>
            </div>



            <div class="form-group"> 
          <label for="">
          State
          </label>
          <select name="state" class="states form-control" value=" <?php
               echo $state;
               ?>" id="stateId">
    <option value="">Select State</option>
</select>
            </div>



            <div class="form-group">
          <label for="">
          City
          </label>
          <select name="city" class="cities form-control" value=" <?php
               echo $City;
               ?>" id="cityId">
    <option value="">Select City</option>
</select>
            </div>
            
            <div class="form-group">
          <label for="">
          Select Category
          </label>
          <select name="category" class="form-control" value=" <?php
               echo $category;
               ?>" id="category">
<?php
while($row=mysqli_fetch_array($query1)){
?>
 <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>
<?php
}
?>

   
</select>
            </div>
      

            
               <div class="form-group">
     
               <input type="submit"class="btn btn-block btn-success" placeholder="Save" name="submit" id="submit">
             </div>



          </form>
          </div>
        

       
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

         
          <div class="table-responsive">
           
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- datatables plugin -->

<script src="https://code.jquery.com/jquery-3.5.1.js">


</script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js">


</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script>

$(document).ready(function(){
  $("#submit").click(function(){
      var job_title=$("#job_title").val();
      var Description=$("#Description").val();
      var countryId=$("#countryId").val();
      var stateId=$("#stateId").val();
      var cityId=$("#cityId").val();
      var category=$("#category").val();
      var Keyword=$("#Keyword").val();
      if(job_title==''){
       alert("please enter job title !!");
       return false;
      }
      if(Description==''){
       alert("please enter description!!");
       return false;
      }
      if(Keyword==''){
       alert("please enter Keyword!!");
       return false;
      }
      if(countryId==''){
       alert("please select country name!!");
       return false;
      }
      if(stateId==''){
       alert("please select state name!!");
       return false;
      }
      if(cityId==''){
       alert("please select city name!!");
       return false;
      }
      if(category==''){
       alert("please select category name!!");
       return false;
      }

      
      var data=$("#job_form").serialize();
      
  });
});

</script>
  </body>
</html>
<?php
include('connection/db.php');
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $job_title=$_POST['job_title'];
    $Description=$_POST['Description'];
    $Country=$_POST['country'];
    $State=$_POST['state'];
    $City=$_POST['city'];
    $category=$_POST['category'];
    $Keyword=$_POST['Keyword'];
    $query1=mysqli_query($conn,"update all_jobs set job_title='$job_title',des='$Description',country='$Country',state='$State',city='$City',category='$category',keyword='$Keyword' where job_id='$id'");
    if($query1)
{
echo "<script>alert('Record has been successfully updated!!!!')</script>";
 header('location:Job_create.php');
}
else{
    echo "<script>alert('some error please try again')</script>";

}
   
}

?>