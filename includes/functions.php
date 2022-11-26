<?php 
//durata filmului
    function runtime_prettier($runtime)
{
    $hours = (int)($runtime / 60);
    $runtime -= $hours * 60; 
    return sprintf("%dh %02.0fmin", $hours, $runtime);
}
//varsta filmului
function check_old_movie($year)
{
    $current_year=date('Y');
    $ages = $current_year - $year;
    if($ages > 40){
        return $ages;}
        else {return false;}
}
//gasirea array-ului din fisierul JSON
function id_finder($item){
    if(!isset($_GET['movie_id'])) return false;

    if($item['id'] === intval($_GET['movie_id'])){
    return true;
    } else {
    return false;
  }
}
//functia de search
function title_finder($item){
    if(stripos($item['title'],$_GET['s']) === false){
        return false;
    }else{
        return true;
    }
}
//gasirea genului
function genre_finder($item){
    if(stripos($item['genres'],$_GET['s']) === false){
        return false;
    }else{
        return true;
    }
}
//verificarea cookie-ului (w62d)
function check_favorite_cookie($id){
    if(isset($_COOKIE['favorite_movie'])){
        foreach((array)json_decode($_COOKIE['favorite_movie']) as $key => $val){
            if((int)$key == (int)$id){
                return true;
            }else{
                return false;
            }
        } 
    }
}
//stocarea filmelor adaugate la favorite (w63a)
function add_to_json($movie_id){
    $json_file = "./assets/movie-favorites.json";
    $content = file_get_contents('./assets/movie-favorites.json');
    $new_item = [];

    if((array)json_decode($content) => $movie_id){
        foreach((array)json_decode($content) as $key => $value){
            if($key == $movie_id){
                $new_item = $new_item + [$key => $value + 1];
            }
            $new_item = $new_item +[$key => $value];
        } 
    }else{
        $new_item = (array)json_decode($content) + [$movie_id => 1];
    }
 file_put_contents($json_file, json_encode($new_item));
}
function remove_from_json($movie_id){
    $json_file = "./assets/movie-favorites.json";
    $content = file_get_contents('./assets/movie-favorites.json');
    $new_item = [];

    if((array)json_decode($content) -> $movie_id){
        foreach((array)json_decode($content) as $key => $value){
            if($key == $movie_id){
                $new_item = $new_item + [$key => $value - 1];
            }
            $new_item = $new_item +[$key => $value];
        } 
    }else{
        $new_item = (array)json_decode($content) + [$movie_id => 1];
    }
 file_put_contents($json_file, json_encode($new_item));
}

function get_json_favorite($movie_id){
    $content = file_get_contents('./assets/movie-favorites.json');

    if(!empty($content[$movie_id])){
        return !empty($content[$movie_id]);
    }else{
        return 0;
    }
}