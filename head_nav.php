<!DOCTYPE HTML>

<html lang="en">
        
<?php 
    session_start();
    include("config.php");
    include('functions.php');

    // Connection
    $db_connect = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
?>
    
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Book Fan Reading Log">
    <meta name="keywords" content="books, reading, log, fiction">
    <meta name="author" content="MC">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="Cache-control" content="no-cache">-->
    
    <title>Book Fan</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" href="bookstyle.css" rel="stylesheet" >
   
</head>

<body>
    
    <div class="wrapper">
        
        <div class="box logo">
            <img src="Images/book.jpg"  alt="book leaves">
        </div>    <!-- /logo -->
        
        <div class="box banner">
            <h1>Book Fan</h1>
            
        </div>  <!-- /banner -->
     
                
        <div class="box nav">
            <a href="index.php">Home Page</a> |
            <a href="review.php">Book Reviews</a>
            
        </div>     <!-- /nav -->