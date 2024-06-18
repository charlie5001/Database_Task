<h1>All Items</h1>
<?php 
    if (!$count){
        echo "None";
        return;
    }
    do{
?>
<div class = "results">

    <p>Title: <span class="sub_heading"><?php echo $show_all_rs["Title"];?></span></p>
    <p>Author: <span class="sub_heading"><?php  
    
    $a = $show_all_rs['Author_First'];
    $b = $show_all_rs['Author_Last'];

    echo "$a $b";
    ?></span></p>
    <p>Genre: <span class="sub_heading"><?php echo $show_all_rs["Genre"];?></span></p>
    <p>Rating: <span class="sub_heading"><?php 
    $amount = $show_all_rs["Rating"];
    $f = "";
    foreach(range(0,$amount-1) as $i) {
        $f .= "⭐";
    }
    echo "$f";
    ?></span></p>
    <p>Review: <span class="sub_heading"><?php echo $show_all_rs["Review"];?></span></p>

</div> <!-- /main --> 

<?php 
        }
    while($show_all_rs=mysqli_fetch_assoc($show_all_query));
?>