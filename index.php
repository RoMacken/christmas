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
      <h1>My fav memories</h1>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="gallery.php?id=1">Gallery</a></li>
          <li><a href="create.php">New memory</a></li>
        </ul>
      </nav>
    </header>

    <main id="content">
      <div id="list">
        <?php foreach ($pics as $key => $pic): ?>
          <div class="memory">
            <img src="<?php echo $pic['link']; ?>" alt="" />
            <h1><a href="gallery.php?id=<?= $key?>"><?php echo $pic['name']; ?></a></h1>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
  </body>
</html>
