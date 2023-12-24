<?php
$pics_str = file_get_contents('pics.json');
$pics = json_decode($pics_str, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My fav memories</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1>My fav memories | upload new </h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php?id=1">Gallery</a></li>
            </ul>
        </nav>
    </header>
<br>
    <form action="">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name of the memory" /><br>
        <label for="link">Link</label>
        <input type="text" name="link" id="link" placeholder="Link to a picture in connection with the memory" /><br>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="What happened?"></textarea><br>
        <input type="submit" value="Upload" />
    </form>
</body>