<?php
// parser.php: parser file for getting movies from imdb
// https://github.com/chrisjp/IMDb-PHP-API
// req. api: require imdb api file
require_once("imdbapi.php"); // include imdb api file
// cre. api: create imdb api object
$imdb = new Imdb(); // create imdb object with default parameters
// get mov.: get movies array from movies table
$movies = $this->get_movies(); // get movies array from movies table with get_movies method
// loop mov.: loop through movies array
foreach ($movies as $movie) { // loop through movies array with movie variable
  // get id: get movie id from movie array
  $id = $movie["id"]; // get movie id value from movie array with id key
  // get tit.: get movie title from movie array
  $title = $movie["title"]; // get movie title value from movie array with title key
  // get dat.: get movie data from imdb by id or title with imdb api object
  if ($id) { // check id value is not empty
    $data = $imdb->find_by_id($id); // get movie data array by id with find_by_id method of imdb object
  } else { // else id value is empty
    $data = $imdb->find_by_title($title); // get movie data array by title with find_by_title method of imdb object
  }
  // upd. tab.: update movies table with movie data
  $this->update_movies($id, $data); // update movies table with id and data parameters with update_movies method
}
?>