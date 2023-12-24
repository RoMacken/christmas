<?php
$pics_str = file_get_contents('pics.json');
$pics = json_decode($pics_str, true);

$id = intval($_GET['id']);

// Find the item with the matching id
$selected_key = null;
foreach ($pics as $key => $pic) {
    if ($pic['id'] == $id) {
        $selected_key = $key;
        break;
    }
}

if ($selected_key === null) {
    // Handle the error, e.g., redirect the user or display an error message
    header('Location: index.php');
    exit;
}

$selected = $pics[$selected_key];
// ...
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit</title>
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
    <br>
    <form action="" method="get">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name of the memory" value="<?=$selected["name"]?>"/><br>
        <label for="link">Link</label>
        <input type="text" name="link" id="link" placeholder="Link to a picture in connection with the memory" value="<?=$selected["link"]?>"/><br>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="What happened?"><?=$selected["description"]?></textarea><br>
        <input type="submit" value="Upload" />
    </form>
</body>

<!-- TODO: Update the JSON file with the new data -->
<?php
if (isset($_GET['name']) && isset($_GET['link']) && isset($_GET['description'])) {
    $selected["name"] = $_GET['name'];
    $selected["link"] = $_GET['link'];
    $selected["description"] = $_GET['description'];
    $pics[$selected_key] = $selected;
    $pics_str = json_encode($pics);
    file_put_contents('pics.json', $pics_str);
    header('Location: gallery.php?id=' . $selected["id"]);
}
?>