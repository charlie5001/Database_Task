<?php 
    include "head_nav.php";
?>

<div class="main">
    <?php
        $title = $_POST["title"];
        $author = $_POST["author"];
        $genre = $_POST["genre"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];
        $email = $_POST["email"];  
        if (empty($title) || empty($author) || empty($genre) || empty($rating) || empty($review) || empty($email)) {


            if (mysqli_connect_error()) {
                die("Connect Error ('".mysqli_connect_errno().")".mysqli_connect_error());
            }


        } else {
            $INSERT = "INSERT Into book_reviews (title, author_first, author_last, genre, rating, review, email) 
            values (?,?,?,?,?,?,?)";
            $names = explode(" ",$author);
            $author_first = "";
            $author_last = "";
            foreach($names as $key=>$value){
                if ($key == 0) {
                    $author_first .= $value;
                } else {
                    $author_last.=$value;
                }
            }

            $stmt = $db_connect->prepare($INSERT);
            $stmt->bind_param("ssssiss",$title,$author_first, $author_last,$genre,$rating,$review,$email);
            $stmt->execute();
            echo "New Record Added successfully";
            $stmt->close();
        }
    ?>
</div>
