<?php require_once('./includes/header.php');?>
    <h1><?php 
        date_default_timezone_set('Europe/Bucharest');
        $current_hour = date("H");
        switch($current_hour){
          case $current_hour > 6 && $current_hour <=11:
          echo "Good Morning!";
          break; 
          case $current_hour > 11 && $current_hour <=15:
          echo "Good Afternoon!";
          break;
          case $current_hour > 15 && $current_hour <=23:
          echo "Good Evening!";
          break;
          default: echo "Good Night!"; 
          break;
    }?>Don't know what to watch?</h1>
     <div class="col text-center">
       <a href="movies.php" class="btn btn-primary">Today's Recommendations</a>
     </div>
<?php require_once('./includes/footer.php');?>