<?php
    ob_start();
     require('header.php');

    //create variables to store form data

    $network = filter_input(INPUT_POST, 'network');
    $movie_title = filter_input(INPUT_POST, 'movietitle');
    $genre = filter_input(INPUT_POST, 'genre');
    $review = filter_input(INPUT_POST, 'review');
    $id = null;
    $id = filter_input(INPUT_POST, 'user_id');


    //set up a flag variable
    $ok = true;

    //validation for email address


    if($ok === true) {
        try {
            //connect to the database
            require('connect.php');
            $conn = dbo();
            //set up our SQL query

            //if we have an id, we are editing
            if(!empty($id)) {
                $sql = "UPDATE movies SET network = :network, movie_title = :movietitle, genre = :genre, review = :review WHERE user_id = :user_id;";
            }
            //if not, adding a new record
            else {
                $sql = "INSERT INTO movies (network, movie_title, genre, review) VALUES (:network, :movietitle, :genre, :review);";

            }
            //call the prepare method of the PDO object
            $statement = $conn->prepare($sql);
            //bind parameters

            $statement->bindParam(':network', $network, PDO::PARAM_STR);
            $statement->bindParam(':movietitle', $movie_title, PDO::PARAM_STR);
            $statement->bindParam(':genre', $genre, PDO::PARAM_STR);
            $statement->bindParam(':review', $review, PDO::PARAM_STR );

            if(!empty($id)) {
                $statement->bindParam(':user_id', $id );
            }
            //execute the query
            $statement->execute();
            //close the db connection
            $statement->closeCursor();
            header('location:view.php');
        }
        catch(PDOException $e) {
            echo "<p> something broke </p>";
            $error_message = $e->getMessage();
            echo $error_message;
        }
    }
    ob_flush();
    require('footer.php'); ?>
