<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>

<body>
  <?php
 

    echo $appName;
    ?>
    <?php
    echo $companyName;
    ?>
    <br>
    <?php
    echo $description;
    ?>
    <br>
    <?php
    foreach ($liste as $element)
        echo "<div>$element</div>";
    ?>
</body>

</html>