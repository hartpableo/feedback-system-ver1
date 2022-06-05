<?php
  $page_number = 2;
  $page_title = 'Feedbacks';
  include 'includes/header.php'; 
?>

        <!-- Intro Text -->
        <h1 class="mb-5">Feedbacks</h1>
        <!-- Feed -->

        <!-- Get Data From Database -->
        <?php
          $sql = 'SELECT * FROM feedback';
          $result = mysqli_query($conn,$sql);
          $feedback = mysqli_fetch_all($result,MYSQLI_ASSOC);
        ?>

        <!-- Display This Text if NO Feedbacks are available -->
        <?php if (empty($feedback)) { ?>
            <p>There are currently no feedbacks! Come again later...</p>
        <?php } ?>

        <?php foreach($feedback as $item) { ?>  <!-- Feedback Card Loop -->

        <div class="card mb-5" style="width: 100%;margin:auto;max-width: 650px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $item['name']; ?></h5>
              <p class="card-text"><?php echo $item['body']; ?></p>
              <p><small><?php echo $item['email']; ?></small><br><small><?php echo date_format(date_create($item['date']), 'g:ia \o\n l jS F Y'); ?></small></p>
            </div>
        </div>

        <?php } ?> <!-- Close Feedback Card Loop -->

<?php include 'includes/footer.php'; ?>