<?php

require_once 'config.php';

$id = $_GET['id'];

$movieQuery = $db->query(
  'SELECT * FROM `movies` WHERE `id` = ' . $id
);
$movie = $movieQuery->fetch(PDO::FETCH_ASSOC);

$rolesQuery = $db->query(
  'SELECT * FROM `roles` WHERE `movie_id` = ' . $movie['id']
);

if ($rolesQuery !== FALSE) {
  $roles = $rolesQuery->fetchAll(PDO::FETCH_ASSOC);
} else {
  die('Query Error!');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>IMDB Access</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h1><?=$movie['name']?></h1>
            <ul>
              <li>Year: <?=$movie['year']?></li>
              <li>Rank: <?=$movie['rank']?></li>
            </ul>

            <div class="card">
                <div class="card-header">
                  Roles
                </div>
                <div class="card-body">
                  <table class="table">
                      <thead>
                      <tr>
                          <th>role</th>
                          <th>Actor ID</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($roles as $role) : ?>
                          <tr>
                              <td><?=$role['role']?></td>
                              <td><?=$role['actor_id']?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
