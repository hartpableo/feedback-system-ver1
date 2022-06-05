<?php
  $page_number = 1;
  include 'includes/header.php'; 
?>

        <!-- Intro Text -->
        <h1>Hart Pableo</h1>
        <p>Please leave me your feedbacks!</p>

        <!-- Form Handling -->
        <?php
          // Empty Variables
          $name = $email = $body = '';
          $nameErr = $emailErr = $bodyErr = '';

          // Form Submit
          if(isset($_POST['submit'])) {
            // Validate Name
            if(empty($_POST['name'])) {
              $nameErr = 'Name is required!';
            } else {
              $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            // Validate Email
            if(empty($_POST['email'])) {
              $emailErr = 'Email is required!';
            } else {
              $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            }

            // Validate Body
            if(empty($_POST['body'])) {
              $bodyErr = 'Your feedback is required!';
            } else {
              $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            if(empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
              // Insert Data Into Database
              $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name','$email','$body')";
              if(mysqli_query($conn, $sql)) {
                // Success
                echo 'Success!';
                header ('Location: feedbacks.php');
              } else {
                // Error
                echo 'Error: ' . mysqli_error($conn);
              }
            }

          }
        ?>

        <!-- Form -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" style="max-width:600px;margin:auto;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid' : null; ?>" placeholder="John Doe" name="name">
                <div class="invalid-feedback">
                  <?php echo $nameErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" placeholder="name@example.com" name="email">
                <div class="invalid-feedback">
                  <?php echo $emailErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
                <textarea class="form-control <?php echo $bodyErr ? 'is-invalid' : null; ?>" style="resize:none;overflow:auto;" placeholder="Message(s)" name="body"></textarea>
                <div class="invalid-feedback">
                  <?php echo $bodyErr; ?>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>  
        </form>      

<?php include 'includes/footer.php'; ?>