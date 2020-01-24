<!-- SINGLE MOVIE DETAIL PAGE -->
<?php
    require_once 'load.php';
    
    //load in movie info by ID this time
    if(isset($_GET['id'])){
        $movie_table = 'tbl_movies';
        $id = $_GET['id'];
        $col = 'movies_id';


        $getMovies = getSingleMovie($movie_table, $col, $id);
    }
?>


<!-- HTML DOCUMENT STARTS HERE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS Movie Project</title>
</head>

<body>
<!-- HEADER -->
    <?php include 'templates/header.php'; ?>


    <?php while($row = $getMovies->fetch(PDO::FETCH_ASSOC)):?>
        <div class="movie-item">
            <img src="images/<?php echo $row['movies_cover'];?>" alt="<?php echo $row['movies_title']; ?>"/>
            <h2><?php echo $row['movies_title']; ?></h2>
            <h4><?php echo $row['movies_year']; ?></h4>

            <p><?php echo $row['movies_storyline']; ?></p>

            <a href="index.php">Go Back</a>
        </div>
    <?php endwhile;?>

<!-- FOOTER -->
    <?php include 'templates/footer.php'; ?>
</body>
</html>