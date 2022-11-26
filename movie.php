<?php require_once('./includes/header.php');?>
<?php
  //filtrez filmele
  $movies_filtered = array_filter($movies, 'id_finder');
  //conditie pentru link ca acesta sa nu dea eroare in caz de editare/stergere
  if(isset($movies_filtered) && $movies_filtered){
  $movie =  reset($movies_filtered);
  $movie_id = $_GET['movie_id'];
}
?>

<?php // add to favorite 
  if (isset($_POST['favorite'])){
    $movie_id = [(int)$_GET['movie_id'] => (int)$_POST['favorites']];
    if (isset($_COOKIE['favorite_movie'])){
      foreach ((array)json_decode($_COOKIE['favorite_movie']) as $key => $val){
        if((int)$key == (int)$_GET['movie_id']){
          $movie_id = array_replace($movie_id, [$_GET['movie_id'] => $val + $_POST['favorite']]);
        }else{
          $movie_id = $movie_id + [$key => $val];
        }
    }
      setcookie("favorite_movie", json_encode($movie_id) , (time() + 31536000), "/");
    }else{
      setcookie("favorite_movie", json_encode($movie_id) , (time() + 31536000), "/");
    }
  }

  // trimiti date la movie-favorites.json
  add_to_json($_GET['movie_id']);

  // remove from favorite
  if (isset($_POST['notfavorite'])){
  if (isset($_COOKIE['favorite_movie'])){
  $movie_id = [];
    foreach ((array)json_decode($_COOKIE['favorite_movie']) as $key => $val){
      if((int)$key == (int)$_GET['movie_id']){
        $movie_id = ['remove' => $_POST['notfavorite']];
      }
    $movie_id = $movie_id + [$key => $val];
  }
    setcookie("favorite_movie", json_encode($movie_id) , (time() + 31536000), "/");
  }else{
    setcookie("favorite_movie", json_encode($movie_id) , (time() + 31536000), "/");
  }
}

  // scoti date de la movie-favorites.json
  remove_from_json($_GET['movie_id']);

  //if facut sa redirectioneze in caz de link gresit 
   if(isset($movie) && $movie){ ?> 
   <h2><?php echo $movie['title'];?></h2>
      <form method="POST">
        <?php if(check_favorite_cookie($_GET['movie_id'])){?>
          <input type="hidden" name="favorites" value="1">
          <button type="submit" name="favorite" class="btn btn-primary position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo get_json_favorite($_GET['movie_id'])?>
            <span class="visually-hidden">unread messages</span>
          </button>
        <?php }else{ ?>
          <input type="hidden" name="favorites" value="0">
          <button type="submit" name="notfavorite" class="btn btn-danger">
            Remove from favorites
          </button>
        <?php } ?>
      </form>
    <div class="row">
      <div class="col-md-3"> 
       <img src=<?php echo $movie['posterUrl'];?>>
      </div>
     <div class="col-md-8">
       <p><?php echo $movie['plot'];?></p>
       <p><strong>Year of release: </strong><?php echo $movie['year'];?>
       <?php 
          $movie_year = $movie['year'];
          $movie_years = check_old_movie($movie['year']);
       if($movie_years){
          ?>
          <span class="badge bg-info">Old Movie: <?php echo $movie_years?> years old</span>
          <?php
          }
      else{
          ?>
          <span class="badge bg-success">NEW</span>
          <?php
      }
      ?></p>
       <p><strong>Directed by: </strong><?php echo $movie['director'];?></p>
       <p><strong>Runtime: </strong>
       <?php echo runtime_prettier($movie['runtime'])?></p>
       <p><strong>Genres: </strong><?php echo(implode(', ', $movie['genres']));?></p>
       <h5>Cast</h5>
       <ul>
         <?php 
         $actors = explode(',', $movie['actors']);
         foreach ($actors as $actor){
         print '<li>';
         print($actor);
         print '</li>';
         }?>
       </ul>  
      </div>
   </div> 
   <?php } else{ //pagina de eroare cu buton spre pagina de filme ?>
    <h1>Movie page</h1>
    <p>Error! This movie doesn't exist!</p>
    <a href="./movies.php" class="btn btn-primary">Back to all movies</a>
    <?php } ?>
   <?php require_once('./includes/footer.php');?>
