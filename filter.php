<?php
// filter.php: filter file
// filt. class: filter class
class Filter {
  // conn. prop: connection property
  private $conn; // connection object
  // cons. meth: constructor method
  public function __construct($conn) { // constructor with connection parameter
    $this->conn = $conn; // assign connection object to property
  }
  // apply meth: apply method
  public function apply($input) { // apply method with input parameter
    // gen. filt.: generate filter
    $filter = $this->generate_filter(); // generate random filter array
    // app. filt.: apply filter
    $filtered_movies = $this->apply_filter($filter, $input); // apply filter array to input data and get filtered movies array
    // ret. res.: return result
    return $filtered_movies; // return filtered movies array
  }
  // gen. filt. meth: generate filter method
  private function generate_filter() { // generate filter method
    // init. filt.: initialize filter
    $filter = array(); // create empty filter array
    // gen. crit.: generate criteria
    $criteria = array("genre", "year", "rating", "country"); // create criteria array
    $num_criteria = rand(1, count($criteria)); // generate random number of criteria between 1 and length of criteria array
    $selected_criteria = array_rand($criteria, $num_criteria); // select random criteria from criteria array with number of criteria parameter
    if (!is_array($selected_criteria)) { // check selected criteria is not array (only one criterion selected)
      $selected_criteria = array($selected_criteria); // convert selected criteria to array with one element
    }
    // loop crit.: loop through selected criteria array
    foreach ($selected_criteria as $criterion) { // loop through selected criteria array with criterion variable
      // switch crit.: switch criterion cases
      switch ($criterion) { // switch criterion variable cases
        case "genre": // genre case
          // gen. genre: generate genre value
          $genres = array("Action", "Adventure", "Comedy", "Crime", "Drama", "Fantasy", "Horror", "Romance", "Sci-Fi", "Thriller"); // create genres array
          $num_genres = rand(1, count($genres)); // generate random number of genres between 1 and length of genres array
          $selected_genres = array_rand($genres, $num_genres); // select random genres from genres array with number of genres parameter
          if (!is_array($selected_genres)) { // check selected genres is not array (only one genre selected)
            $selected_genres = array($selected_genres); // convert selected genres to array with one element
          }
          $genre_values = array(); // create empty genre values array
          foreach ($selected_genres as $genre) { // loop through selected genres array with genre variable
            $genre_values[] = $genres[$genre]; // append genre value from genres array with genre index to genre values array 
          }
          $filter["genre"] = implode(",", $genre_values); // join genre values array with comma separator and assign to filter array with genre key 
          break; // break genre case

        case "year": // year case 
          // gen. year: generate year value 
          $min_year = 1900; // set minimum year value 
          $max_year = date("Y"); // set maximum year value as current year 
          $year_value = rand($min_year, $max_year); // generate random year value between minimum and maximum year values 
          $filter["year"] = strval($year_value); // convert year value to string and assign to filter array with year key 
          break; // break year case 

        case "rating": // rating case 
          // gen. rating: generate rating value 
          $min_rating = 1; // set minimum rating value 
          $max_rating = 10; // set maximum rating value 
          $rating_value = rand($min_rating, $max_rating); // generate random rating value between minimum and maximum rating values 
          $filter["rating"] = strval($rating_value); // convert rating value to string and assign to filter array with rating key 
          break; // break rating case 

        case "country": // country case 
          // gen. country: generate country value 
          $countries = array("USA", "UK", "France", "Germany", "China", "India", "Japan", "Russia", "Canada", "Australia"); // create countries array
          $num_countries = rand(1, count($countries)); // generate random number of countries between 1 and length of countries array
          $selected_countries = array_rand($countries, $num_countries); // select random countries from countries array with number of countries parameter
          if (!is_array($selected_countries)) { // check selected countries is not array (only one country selected)
            $selected_countries = array($selected_countries); // convert selected countries to array with one element
          }
          $country_values = array(); // create empty country values array
          foreach ($selected_countries as $country) { // loop through selected countries array with country variable
            $country_values[] = $countries[$country]; // append country value from countries array with country index to country values array 
          }
          $filter["country"] = implode(",", $country_values); // join country values array with comma separator and assign to filter array with country key 
          break; // break country case 

        default: // default case 
          // do noth.: do nothing 
          break; // break default case 
      }
    }
    // ret. filt.: return filter
    return $filter; // return filter array
  }
  // app. filt. meth: apply filter method
  private function apply_filter($filter, $input) { // apply filter method with filter and input parameters
    // init. mov.: initialize movies
    $movies = array(); // create empty movies array
    // build sql: build sql query
    $sql = "SELECT * FROM movies WHERE "; // create sql query string with select statement and where clause
    $conditions = array(); // create empty conditions array
    foreach ($filter as $key => $value) { // loop through filter array with key and value variables
      $conditions[] = "$key IN ('$value')"; // append condition string with key and value variables to conditions array
    }
    $sql .= implode(" AND ", $conditions); // join conditions array with and operator and append to sql query string
    // exec. sql: execute sql query
    $result = $this->conn->query($sql); // execute sql query string with connection object and get result object
    if ($result->num_rows > 0) { // check result object has more than zero rows
      while ($row = $result->fetch_assoc()) { // loop through result object rows with row variable
        $movies[] = $row; // append row array to movies array
      }
    }
    // rel. mov.: relevance movies
    $relevance_movies = $this->relevance_movies($movies, $input); // relevance movies array with input data and get relevance movies array with score key
    // sort mov.: sort movies by score in descending order
    usort($relevance_movies, function($a, $b) {return $b["score"] - $a["score"];}); // sort relevance movies array by score key in descending order with user-defined comparison function
    // ret. mov.: return movies
    return $relevance_movies; // return relevance movies array
  }
  // rel. mov. meth: relevance movies method
  private function relevance_movies($movies, $input) { // relevance movies method with movies and input parameters
    // init. rel.: initialize relevance 
    $relevance_movies = array(); // create empty relevance movies array 
    foreach ($movies as $movie) { // loop through movies array with movie variable 
      $movie["score"] = 0; // add score key to movie array with zero value 
      if (stripos($movie["title"], $input) !== false) { // check movie title contains input data case-insensitively 
        $movie["score"] += 10; // increase movie score by 10 
      }
      if (stripos($movie["plot"], $input) !== false) { // check movie plot contains input data case-insensitively 
        $movie["score"] += 5; // increase movie score by 5 
      }
      if (stripos($movie["actors"], $input) !== false) { // check movie actors contains input data case-insensitively 
        $movie["score"] += 3; // increase movie score by 3 
      }
      if (stripos($movie["director"], $input) !== false) { // check movie director contains input data case-insensitively 
        $movie["score"] += 2; // increase movie score by 2 
      }
      if (stripos($movie["genre"], $input) !== false) { // check movie genre contains input data case-insensitively 
        $movie["score"] += 1; // increase movie score by 1 
      }
      $relevance_movies[] = $movie; // append movie array to relevance movies array 
    }
    // ret. rel.: return relevance 
    return $relevance_movies; // return relevance movies array 
  }
}
?>