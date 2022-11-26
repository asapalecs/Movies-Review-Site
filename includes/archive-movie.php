      <div class="col-md-4" 
      id="movie-<?php echo $movie['id']; ?>">
          <div 
          class="card text-center" 
          id="movie">
              <img 
              src=<?php echo $movie['posterUrl']; ?> 
              class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $movie['title'];?>
                </h5>
                  <p class="card-text">
                    <?php 
                      if(strlen($movie['plot']) < 100){
                        echo $movie['plot'];
                      }else{
                        echo substr($movie['plot'], 0, 100).'...';
                    }?>
                  </p>
                  <a href="movie.php?movie_id=<?php echo $movie['id']; ?>" 
                  class="btn btn-primary" 
                  key="movie_id">
                  Read More
                </a>
              </div>
          </div>
      </div>
