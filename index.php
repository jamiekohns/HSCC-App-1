<?php

require_once 'config.php';


    $query = $db->query(
    'SELECT 
        *
      FROM
        `movies`
      WHERE
        `year` = 2000
        AND `rank` IS NOT NULL
      ORDER BY `rank` DESC
      LIMIT 10'
    );

    $topTen = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>IMDB Access</title>


        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <h1>IMDB</h1>

            <div class="card">
                <div class="card-header">
                    Top 10 Movies of 2000
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID#</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Rank</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($topTen as $movie) {
                            echo '<tr>';
                            echo '    <td>' . $movie['id'] . '</td>';
                            echo '    <td>' . $movie['name'] . '</td>';
                            echo '    <td>' . $movie['year'] . '</td>';
                            echo '    <td>' . $movie['rank'] . '</td>';
                            echo '</tr>';
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <?php
                $query = $db->query(
                    'SELECT
                    *
                    FROM
                    `movies`
                    WHERE
                    `year` = 1986
                    AND `rank` IS NOT NULL
                    ORDER BY `rank` DESC
                    LIMIT 10'
                );

                $topTen = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="card">
                <div class="card-header">
                    Top 10 Movies of 1986
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID#</th>
                            <th>Name</th>
                            <th>Year</th>
                            <th>Rank</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($topTen as $movie) :
                        ?>
                            <tr>
                                <td><?=$movie['id']?></td>
                                <td><?=$movie['name']?></td>
                                <td><?=$movie['year']?></td>
                                <td><?=$movie['rank']?></td>
                            </tr>
                        <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
