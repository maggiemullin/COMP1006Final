<?php
ob_start();
try {
    $movie_id = filter_input(INPUT_GET, 'id');
    //connect to db
    require('connect.php');
    $conn = dbo();
    //set up query
    $sql = "DELETE FROM movies WHERE user_id = :user_id;";
    //prepare
    $statement = $conn->prepare($sql);
    //bind
    $statement->bindParam(':user_id', $movie_id);
    //execute
    $statement->execute();
    //close DB connection
    $statement->closeCursor();
    header('location:view.php');
}
catch(PDOException $e) {
    header('location:error.php');
}
ob_flush();
?>
