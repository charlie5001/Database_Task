<?php
include "config.php"; // Database connection

// Retrieve data from the form
$title = $_POST['Title'];
$author_fname = $_POST['Author_Fname'];
$author_lname = $_POST['Author_LName'];
$genre = $_POST['Genre'];
$rating = $_POST['Rating'];

// Check if the author already exists
$author_check_query = "SELECT Author_ID FROM authors WHERE Author_Fname = '$author_fname' AND Author_LName = '$author_lname'";
$author_check_result = mysqli_query($db_connect, $author_check_query);

if (mysqli_num_rows($author_check_result) > 0) {
    $author = mysqli_fetch_assoc($author_check_result);
    $author_id = $author['Author_ID'];
} else {
    // Insert new author
    $author_insert_query = "INSERT INTO authors (Author_Fname, Author_LName) VALUES ('$author_fname', '$author_lname')";
    mysqli_query($db_connect, $author_insert_query);
    $author_id = mysqli_insert_id($db_connect);
}

// Check if the book already exists
$book_check_query = "SELECT Book_ID FROM books WHERE Book_Title = '$title' AND Book_Author_ID = $author_id";
$book_check_result = mysqli_query($db_connect, $book_check_query);

if (mysqli_num_rows($book_check_result) > 0) {
    $book = mysqli_fetch_assoc($book_check_result);
    $book_id = $book['Book_ID'];
} else {
    // Insert new book
    $book_insert_query = "INSERT INTO books (Book_Title, Book_Author_ID, Genre, Rating) VALUES ('$title', $author_id, '$genre', '$rating')";
    mysqli_query($db_connect, $book_insert_query);
    $book_id = mysqli_insert_id($db_connect);
}

// Insert the review
$review_insert_query = "INSERT INTO reviews (Book_ID, Review_Text, Review_Rating) VALUES ($book_id, '$review_text', '$review_rating')";
mysqli_query($db_connect, $review_insert_query);

header('Location: index.php');
