    <?php 

    //executing code for head and nav
    include"head_nav.php"; 
        
?>
        <div class = "box main">
            <?php 
            if (empty($_POST)) {
                include 'create_review.php';
            }
            if (!empty($_POST)) {
                $search_string = ""; 
                foreach($_POST as $key=>$value) {
                    
                    if ($value == "" || $key == "bounds" || $key == "sort_order") {
                        continue;
                    }

                    if ($key == "Rating") {
                        $value = text_input(mysqli_real_escape_string($db_connect,$value));
                        $bound = $_POST["bounds"];
                        if ($search_string == "") {
                            $search_string .= " WHERE `$key` $bound $value ";
                        } else {
                            $search_string .= " AND `$key` $bound $value ";
                        }
                        continue;
                    }

                    $value = text_input(mysqli_real_escape_string($db_connect,$value));
                    if ($search_string == "") {
                        $search_string .= " WHERE `$key` LIKE '%$value%' ";
                    } else {
                        $search_string .= " AND `$key` LIKE '%$value%' ";
                    }
                    
                }
                $show_all = "SELECT * FROM `book_reviews`  $search_string ORDER BY `book_reviews`.`Title` ASC;";
                $show_all_query = mysqli_query($db_connect,$show_all);
                $show_all_rs = mysqli_fetch_assoc($show_all_query);
                $count = mysqli_num_rows($show_all_query);
                
                include 'show_all.php';
            }
        ?>
        </div> <!-- /main --> 
        
        <div class="box side">
            <h2><a disabled>Search</a> | Show Main</h2>
            <p>Type part of your title/author name and then search</p>
            <hr />
            <form method="POST" enctype="multipart/form-data">
                <input class="search" type="text" name="Title" size="40" value="" placeholder="Title"></input>
                <input class="submit" type="submit" value="Search"></input>

                <input class="search" type="text" name="Author_First" size="40" value="" placeholder="Author"></input>
                <input class="submit" type="submit" value="Search"></input>

                <select id="genres" name="Genre" class="search">
                    <option disabled selected>Genre...</option>
                    <option value="historical">Historical</option>
                    <option value="humour">Humour</option>
                    <option value="crime">Crime</option>
                    <option value="adventure">Adventure</option>
                    <option value="mystery">Mystery</option>
                </select>
                <input class="submit" type="submit" value="Search"></input>
                <div class="rating">
                    <select id="rating_bound" name="bounds" class="search">
                        <option value=">">Greater Than...</option>
                        <option value="<">Less Than...</option>
                        <option value="=">Equal To...</option>
                    </select>

                    <select id="rating" name="Rating" class="search">
                        <option disabled selected>Rating...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input class="submit" type="submit" value="&#xf002;"></input>
                </div>
            </form>
            
            
           
        </div>    <!-- /side -->
        
<?php include"footer.php" ?>
        
