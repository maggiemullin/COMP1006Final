<?php


    session_start();
    require('header.php');
    echo "<div class='container'>";


    $submit = filter_input(INPUT_GET, 'submit', FILTER_SANITIZE_STRING);
    $network = filter_input(INPUT_GET, 'network', FILTER_SANITIZE_STRING);
    $search_term = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
    $_SESSION['network'] = $network;

    //connect to the db
    require('connect.php');
    $conn = dbo();

    //set up our SQL query
    $query = "SELECT movie_title FROM movies WHERE movie_title LIKE :search_term;";

    //prepare
    $statement = $conn->prepare($query);

    //bind
    $statement->bindValue(':search_term', '%'.$search_term.'%');

    //execute
    $statement->execute();

    echo "<ul>";

    //check for results and display, if not, let the user know that no results found
    if($statement->rowCount() >= 1) {
        while($results = $statement->fetch()) {
            echo "<li>" . $results['movie_title'] . "</li>";
        }
    }
    else {
        echo "<p> No Movie found ths time Friend, try back again later! </p>";
    }
    //close the db connect
    $statement->closeCursor();



    echo "</ul>";
    echo "</div>";
?>