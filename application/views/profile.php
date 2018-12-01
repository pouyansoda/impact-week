<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Your profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style media="screen">

    </style>
    <?php
    if( ! $this->session->user) {
      redirect('/users');
      die();
    }
    ?>
  </head>
  <body>

    <h4>User's posts</h4>
    <?php
    foreach($posts as $post) {
      echo "<h6><a href=/thread/".$post['post_id'].">{$post['title']}</a></h6>";
    }
     ?>
     <hr />

    <?php
    if ($this->session->user['id'] == $user['id']) {
      ?>
      <a href="/users/edit_profile">Edit your profile</a>
      <?php
    }
    ?>
    <?php
    if ($this->session->profile_edit_status == FALSE ) {
      ?>

      <p>
        First name: <?=$user['first_name']?>
      </p>

      <p>
        Last name: <?=$user['last_name']?>
      </p>

      <p>
        Email: <?=$user['email']?>
      </p>

      <p>
        City: <?=$user['city']?>
      </p>
    </div>
      <?php
    } else
    {
      ?>
      <form action="/users/edit_profile" method="post">
        <label>First Name</label>
        <input type='text' name='first_name' value=<?=$user['first_name']?>>
        <br>
        <label>Last name</label>
        <input type='text' name='last_name' value=<?=$user['last_name']?>>
        <br>
        <label>email</label>
        <input type='email' name='email' value=<?=$user['email']?>>
        <br>
        <!--
        Later: add more fields here.
        -->
        <input type='submit' value='Submit' name='submit_profile_edit'>
      </form>
      <?php
    }
    ?>

  <?php
  var_dump($this->session->all_userdata());
    ?>


  </body>
</html>
