<form method="POST" enctype="multipart/form-data" action="save_review.php">
    <input class="search" type="text" name="title" size="40" value="" placeholder="Title" required></input>
    <input class="search" type="text" name="author" size="40" value="" placeholder="Author" required></input>
    <select id="genres" name="genre" class="search" required>
        <option disabled selected>Genre...</option>
        <option value="historical">Historical</option>
        <option value="humour">Humour</option>
        <option value="crime">Crime</option>
        <option value="adventure">Adventure</option>
        <option value="mystery">Mystery</option>
    </select>
    <div class="rating">
        <select id="rating" name="rating" class="search" required>
            <option disabled selected>Rating...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <textarea id="review" name="review" rows="4" cols="50"></textarea>

    <input class="search" type="email" name="email" size="40" value="" placeholder="Email" required></input>
    <input class="submit" type="submit" value="Submit"></input>
</form>