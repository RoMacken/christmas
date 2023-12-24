<?php
$pics_str = file_get_contents('pics.json');
$pics = json_decode($pics_str, true);
$selected = $pics[$_GET['id']];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <h1>My fav memories | <?= $selected["name"] ?></h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="create.php">New memory</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div id="details">
            <img src="<?= $selected["link"] ?>" alt="" />
            <p class="info"><?= $selected["description"] ?></p>
        </div>

        <?php
        $selected_id = $_GET['id'];
        $next_id = $selected_id + 1;
        if ($next_id > count($pics)) {
            $next_id = 1;
        }
        ?>
        <div id="edit">
            <a href="edit.php?id=<?=$selected_id?>"><span>Edit memory</span></a>
        </div>
    </main>
    <footer>
        <a href="gallery.php?id=<?= $next_id ?>">Next memory</a>
    </footer>
</body>