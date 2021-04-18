<?php 
session_start();


require('header.php');
  
  //initialize variables

        $id = null;
        $network = null;
        $movietitle = null;
        $genre = null;
        $review = null;


        //check if user is editing

        if(!empty($_GET['id']) && (is_numeric($_GET['id']))) {
            //grab id and store in a variable
            $id = filter_input(INPUT_GET, 'id');
            //connect to db
            require('connect.php');
            //set up query
            $sql = "SELECT * FROM movies WHERE user_id = :user_id;";
            //prepare
            $statement = $db->prepare($sql);
            //bind
            $statement->bindParam(':user_id', $id);
            //execute
            $statement->execute();
            //use fetchAll method to store
            $films = $statement->fetchAll();
            foreach($films as $film) :
                $network = $film['network'];
                $movietitle = $film['movietitle'];
                $genre = $film['genre'];
                $review= $film['review'];

             endforeach;
             $statement->closeCursor();
            }
        ?>

            <main>
             <div class="col">
                <form action="process.php" method="post">

                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                    <div class="form-group">
                         <input type="text" name="network" placeholder="Network" class="form-control" value="<?php echo $network; ?>">
                     </div>

                     <div class="form-group">
                          <input type="text" name="movietitle" placeholder="Movie Title" class="form-control" value="<?php echo $movietitle; ?>">
                    </div>

                    <div class="form-group">
                           <input type="text" name="genre" placeholder="Genre" class="form-control" value="<?php echo $genre; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" name="review" placeholder="The Lowdown on the Movie" class="form-control" value="<?php echo $review; ?>">
                    </div>
                     
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                    <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                </div>
                <?php include_once('config.php') ?>
                 <script src="https://www.google.com/recaptcha/api.js?render=<?= SITEKEY ?>"></script>
                <script>
                grecaptcha.ready(() => {
                grecaptcha.execute("<?= SITEKEY ?>", { action: "view" })
                .then(token => document.querySelector("#recaptchaResponse").value = token)
                .catch(error => console.error(error));
                });
            </script>
            </main>
        <?php require('footer.php'); ?>