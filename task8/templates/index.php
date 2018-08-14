<html>
<head>
<meta charset="windows-1251" >
	<title>Search</title>
<link rel="stylesheet" href="templates/css/style.css">
</head>
<body>
<div><h2>Search Form</h2></div>



<div class="container">
  <form method="post" action="">
 
  <input type="text" value = "<?=$search?>" id="search" name="search" placeholder="search something">
    <input type="submit" value="Submit">

  </form>
</div>


<div class = "serch-result">

<?php 

foreach ($data as $item){?>
<div class = "item">
    <div class="title">
        <a href="<?=$item['url']?>"><?=$item['title']?></a>
    </div>
    <div class="url">
        <span><?=$item['url']?></span>
    </div>
    <div class="description">
        <?=$item['description']?>
    </div>
</div>
<?php
}
?>

</div>

</body>
</html>
