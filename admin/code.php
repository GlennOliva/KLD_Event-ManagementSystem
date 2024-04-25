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
else if(isset($_POST['delete_categorybtn']))
{
    $id = $_POST['category_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_category WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_category WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 10;

    }
    else
    {
        echo 20;
    }
}
else if(isset($_POST['delete_coursebtn']))
{
    $id = $_POST['course_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_course WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_course WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 30;

    }
    else
    {
        echo 40;
    }
}
else if(isset($_POST['delete_sectionbtn']))
{
    $id = $_POST['section_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_section WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_section WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 35;

    }
    else
    {
        echo 45;
    }
}
else if(isset($_POST['delete_yearlevelbtn']))
{
    $id = $_POST['yearlevel_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_yearlevel WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_yearlevel WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 1;

    }
    else
    {
        echo 2;
    }
}

else if(isset($_POST['delete_userbtn']))
{
    $id = $_POST['user_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_std WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_std WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 2;

    }
    else
    {
        echo 4;
    }
}
else if(isset($_POST['delete_organizerbtn']))
{
    $id = $_POST['organizer_id'];
      //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_organizer WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);




   $sql1 = "DELETE FROM tbl_organizer WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
    

        echo 4;

    }
    else
    {
        echo 8;
    }
}
else if(isset($_POST['delete_eventbtn']))
{

    $id = $_POST['event_id'];
    //Create SQL query to delete admin
$sql = "SELECT * FROM tbl_event WHERE id=$id";

// Execute the query
$result = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result);


$image_name2 = $count2['event_image'];

   $sql1 = "DELETE FROM tbl_event WHERE id=$id";
   $result1 = mysqli_query($conn,$sql1);

   if($result1)
   {
        if(file_exists("../event_image/".$image_name2))
        {
            unlink("../event_image/".$image_name2);
        }

        echo 18;

    }
    else
    {
        echo 19;
    }


}

?>