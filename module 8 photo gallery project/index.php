<?php include './db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Photo Gallery App</title>
        <?php include './css.php'; ?>
    </head>
    <body>
        <div class="container">
            <!-- photo uploading section start -->
            <h1>Photo Gallery</h1>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Photo title" required>
                <input type="file" name = "image" required>
                <button type="submit">Upload</button>
            </form>
            <!-- photo uploading section end -->
            <hr>
            <!-- Photo gallery section start -->
                <div>
                    <!-- Photo Details -->
                    <?php 
                    $result = $conn->query("SELECT*FROM photos ORDER BY created_at DESC");
                    if($result->num_rows>0):
                        while($row = $result->fetch_assoc()):
                    ?>
                    <div>
                        <h2><?php echo $row['title']; ?></h2>
                        <img src="<?=$row['image_path'] ?>" alt="image">
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row['id']?>">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                    <?php
                        endwhile;
                    else:
                        echo "No photos found";
                    endif;    
                    ?>
                </div>
            <!-- Photo gallery section end -->
        </div>
    </body>
</html>