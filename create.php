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
        <!-- TODO: make upload available  -->
        <input type="text" name="link" id="link" placeholder="Link to a picture in connection with the memory" /><br>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="What happened?"></textarea><br>
        <input type="submit" value="Upload" />
    </form>
</body>

<?php
if (isset($_GET['name']) && isset($_GET['link']) && isset($_GET['description'])) {
    $new_pic = [
        'id' => count($pics) + 1,
        'name' => $_GET['name'],
        'link' => $_GET['link'],
        'description' => $_GET['description']
    ];
    $pics[] = $new_pic;
    $pics_str = json_encode($pics);
    file_put_contents('pics.json', $pics_str);
    header('Location: gallery.php?id=' . count($pics));
}
?>