<?php
     require_once 'config/connect.php';

     $product_id = $_GET['id'];
     $product = mysqli_query($connect, query:"SELECT * FROM `products` WHERE `id` = '$product_id'");
     $product = mysqli_fetch_assoc($product);

     $comments = mysqli_query($connect, query:"SELECT * FROM `comments` WHERE `product_id` = '$product_id'");
     $comments = mysqli_fetch_all($comments)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View</title>
</head>
<body>
    <h2>Title: <?= $product['title'] ?></h2>
    <h4>Price: <?= $product['price'] ?></h4>
    <p>Description: <?= $product['description'] ?></p>
    
    <form action="vendor/create_comment.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id']?>">
        <textarea name="body"></textarea>
        <button type="submit">Add comment</button>
    </form>

    <hr>

    <pre>

    </pre>

    <h3>Comments</h3>
    <ul>
        <?php
        foreach ($comments as $comment) {
            ?>
            <li><?= $comment[2] ?></li>
            <?php
        }
        ?>
    </ul>
</body>
</html>