<?php
  session_start();
  // Before we render the form let's check for form values
 
  $form_values = $_SESSION['form_values'] ?? null;

  // Clear the form values
  unset($_SESSION['form_values']);

  // Clear the form values
  require('header.php');
?>
  <body>
    <?php include_once('notification.php') ?>

    <div class="container">
      <header>
        <h1 class="display-4">Login</h1>
      
      </header>

      <section class="mb-5">
        <form action="validate.php" method="post">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="user@gc.on" required value="<?= $form_value['email'] ?? null ?>">
              </div>
            </div>
            
            <div class="col">
              <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" required>
              </div>
            </div>
          </div>

          <button class="btn" type="submit">Log In</button>
          <a class="btn" href="register.php">Sign Up</a>
        </form>
      </section>
    </div>
  </body>
</html>