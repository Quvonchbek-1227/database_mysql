<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php

    $con = $db->connection();

    if ($con) {
        $query = "SELECT * FROM products";
        $result = $db->send_query($query);
        $data = $db->fetch($result);
        // print_r($data);
    } else {
        echo "MB ga ulanishda muammo!";
    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $key) : ?>
                            <tr>
                                <td><?= $key['id'] ?></td>
                                <td><?= $key['name'] ?></td>
                                <td><?= $key['price'] ?></td>
                                <td><?= $key['description'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>