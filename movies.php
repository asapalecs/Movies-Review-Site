<?php require_once('./includes/header.php'); ?>
    <h1>Movies</h1>
    <div class="row"> <?php foreach($movies as $movie){?>
        <?php include('./includes/archive-movie.php'); ?>
        <?php } ?>
    </div>
<?php require_once('./includes/footer.php');?>