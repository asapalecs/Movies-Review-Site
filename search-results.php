<?php require_once('./includes/header.php'); ?>
<?php if(isset($_GET['s']) && strlen($_GET['s']) >= 3){
    $result = $_GET['s']; ?>
    <h1>Search results for: <strong>
        <?php echo $result; ?></strong>
    </h1>
    <?php 
        $filtered_movies = array_filter($movies, 'title_finder');
       if(count($filtered_movies) === 0){ ?>
            <p>No results!</p>
       <?php }else{ ?>
            <div class="row movies-list">
                <?php foreach($filtered_movies as $movie){
                    ?>
                    <div class="col-md-4" id="movie-<?php echo $movie['id']; ?>">
                            <div class="card text-center" id="movie">
                            <img src=<?php echo $movie['posterUrl']; ?> class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $movie['title'];?></h5>
                                    <p class="card-text"><?php 
                                    if(strlen($movie['plot']) < 100){
                                        echo $movie['plot'];
                                    }else{
                                        echo substr($movie['plot'], 0, 100).'...';
                                    } ?></p>
                                    <a href="movie.php?movie_id=<?php echo $movie['id'];  ?>" class="btn btn-primary" key="movie_id">Read More</a>
                                </div>
                            </div>
                    </div>
                    <?php
                } ?>
            </div>
       <?php } ?>
    

<?php } elseif(isset($_GET['s']) && strlen($_GET['s']) < 3){ ?>
        <h1>Invalid Search</h1>
        <p>Your search is invalid.</p>

<?php }else{ ?>
        <h1>Invalid Search</h1>
        <p>Try something else.</p> 
        <?php include('./includes/search-form.php');?>
    <?php } ?>
<?php require_once('./includes/footer.php');?>