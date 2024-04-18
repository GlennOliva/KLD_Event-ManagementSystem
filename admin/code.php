<?php
include('../config/dbcon.php');
session_start();

if(isset($_POST['delete_adminbtn']))
{

    $id = $_POST['admin_id'];
    //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_admin WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);


$image_name2 = $count2['image'];

   $sql1 = "DELETE FROM tbl_admin WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
        if(file_exists("admin_image/".$image_name2))
        {
            unlink("admin_image/".$image_name2);
        }

        echo 200;

    }
    else
    {
        echo 500;
    }


}

else if(isset($_POST['delete_orgbtn']))
{
    $id = $_POST['org_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_org WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_org WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 300;

    }
    else
    {
        echo 600;
    }
}
else if(isset($_POST['delete_venuebtn']))
{
    $id = $_POST['venue_id'];
      //Create SQL query to delete admin
$sql_venue = "SELECT * FROM tbl_venue WHERE id=$id";

// Execute the query
$result_venue = mysqli_query($conn, $sql_venue);

$count_venue = mysqli_fetch_array($result_venue);

   $sql_venue1 = "DELETE FROM tbl_venue WHERE id=$id";
   $result_venue1 = mysqli_query($conn,$sql_venue1);

   if($result_venue1)
   {
    

        echo 400;

    }
    else
    {
        echo 850;
    }
}


?>