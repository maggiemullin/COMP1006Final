<?php
  // Before we render the form let's check for form values
  session_start();
  $form_values = $_SESSION['form_values'] ?? null;

  // Clear the form values
  unset($_SESSION['form_values']);
  require('header.php');
?>

  <body>
    <?php include_once('notification.php') ?>
    
    <div class="container">
      <header>
        <h1 class="display-4 text-center">Registration</h1>
      </header>

      <section class="mb-5">
        <form action="save-registration.php" method="post" novalidate>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="first_name">First Name:</label>
                <input class="form-control" type="text" name="first_name" required placeholder="Bob" value="<?= $form_values['first_name'] ?? null ?>">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input class="form-control" type="text" name="last_name" required placeholder="Burger" value="<?= $form_values['last_name'] ?? null ?>">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" placeholder="user@gc.on" required value="<?= $form_values['email'] ?? null ?>">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="email_confirmation">Email Confirmation:</label>
                <input class="form-control" type="email" name="email_confirmation" placeholder="user@gc.on" required value="<?= $form_values['email_confirmation'] ?? null ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" required>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="password_confirmation">Password Confirmation:</label>
                <input class="form-control" type="password" name="password_confirmation" required>
              </div>
            </div>
          </div>

          <!-- Add the recaptcha field -->
          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

          <button class="btn" type="submit">Sign Up</button>
          <a class="btn" href="login.php">Login</a>
        </form>
      </section>
    </div>

    <!-- Add the recaptcha scripts -->
    <?php include_once('config.php'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?=SITEKEY ?>"></script> 
    <script>
      grecaptcha.ready(() => {
        grecaptcha.execute("<?=SITEKEY ?>", { action: "register" })
        .then(token => document.querySelector("#recaptchaResponse").value = token)
        .catch(error => console.error(error));
      });
    </script>


  </body>
</html>