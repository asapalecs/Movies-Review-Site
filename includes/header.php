<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Cristinescu Alexandru</title>
</head>
<body>
<?php require_once('./includes/functions.php');
    $current_uri = $_SERVER['PHP_SELF'];
    $current_uri_exploded = explode("/", $current_uri);
    $uri = end($current_uri_exploded);
    if(!in_array($current_uri, array('index.php', 'contact.php'))){
    $movies = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['movies'];
    $genres = json_decode(file_get_contents('./assets/movies-list-db.json'), true)['genres'];
}
?>
  <?php
      $menu = array(
              array(
                  'id' => '1',
                  'title' => 'Home',
                  'link' => './index.php'
              ),
              array(
                'id' => '2',
                'title' => 'Movies',
                'link' => './movies.php'
              ),
             array(
              'id' => '3',
              'title' => 'Contact',
              'link' => './contact.php'
             ),
             array(
              'id' => '4',
              'title' => 'Genres',
              'link' => './genres.php'
          )
      );
  ?>
      
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ARC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php 
            foreach ($menu as $m){ echo '<li class="nav-item">';?>
            <a class="nav-link <?php if($m['link'] == $uri) {echo 'active';};?>" href="<?php echo $m['link']?>"><?php echo $m['title']?></a>
          <?php
            }
            ?>
            </li>
        </ul>
          <?php require_once('./includes/search-form.php');?>
      </div>
  </nav><br>
  <div class="container">