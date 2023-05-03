<?php
// main.php: main file
// conn. db: connect to database
$db_host = "localhost"; // db host name
$db_user = "root"; // db user name
$db_pass = "password"; // db password
$db_name = "movies"; // db name
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name); // create connection object
if ($conn->connect_error) { // check connection error
  die("Connection failed: " . $conn->connect_error); // terminate script
}
// get input: get input data from user
$input = $_POST["input"]; // get input data from POST request
if (empty($input)) { // check input data is not empty
  die("Input data is empty"); // terminate script
}
// call filt.: call filter class
require_once("filter.php"); // include filter file
$filter = new Filter($conn); // create filter object with connection parameter
$filtered_movies = $filter->apply($input); // apply filter to input data and get filtered movies array
// call pred.: call predict class
require_once("predict.php"); // include predict file
$predict = new Predict(); // create predict object
$predicted_movies = $predict->apply($filtered_movies); // apply predict to filtered movies and get predicted movies array with rating and review
// show res.: show results on screen
foreach ($predicted_movies as $movie) { // loop through predicted movies array
  echo $movie["title"] . "\n"; // print movie title
  echo "Rating: " . $movie["rating"] . "\n"; // print movie rating
  echo "Review: " . $movie["review"] . "\n"; // print movie review
  echo "-----------------\n"; // print separator
}
?>