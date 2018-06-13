<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

 
</head>

<body>

<h3>Select MYsql</h3>
    <?php foreach ($array3 as $key => $item){?>
    
<?php foreach ($item as $k => $val){?>
<p>key = <?php echo $k?> val = <?php echo $val?></p>
<?php }?>
<?php }?>

<h3>Select Psql</h3>
    <?php foreach ($array2 as $key => $item){?>
    
<?php foreach ($item as $k => $val){?>
<p>key = <?php echo $k?> val = <?php echo $val?></p>
<?php }?>
<?php }?>
</body>
</html>
