<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css" >
</head>
<body>
    <div class="container">
        <!-- added bootstrap navbar https://getbootstrap.com/docs/5.0/components/navbar/ -->
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                     session_start();
                     if (empty($_SESSION['user'])){
                         echo
                         '<a class="nav-link" href="login.php">Login</a>
                          <a class="nav-link" href="register.php">Sign up</a>';
                    } else {
                        echo
                           '<a class="nav-link" href="movies.php">Add Review</a>
                            <a class="nav-link" href="view.php">Reviews</a>
                            <a class="nav-link" href="logout.php">Log Out</a>';
                            }
                            ?>
                    </div>
                    
                </nav>
                <header>
                    <h1 class="text-center"> Movie Hacks </h2> </br> <p class="text-center"> Stop Wasting Time Looking For A Movie, Reviews To Make Your Night More Enjoyable </p>
                </header>