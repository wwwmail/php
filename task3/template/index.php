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

<p>find string by number - <?php echo $numStr ?>: <?php echo $string ?></p>
<p>find symbol by number string - <?php $numStr ?> and number symbol - <?php $numSymb?>: <?php echo $symbol?> </p>
<p>replace symbmol on number string - <?php echo $numStrRep?> and number symb - <?php echo $numSymbRep?> on <b><?php echo $repSymbol ?></b>: <?php echo $replace_symbol ?> </p>

<p>string before replace : <?php echo $beforeRep ?> </p>
<p>string after replace: <?php echo $check_symbol?></p>


<p>replace string num - <?php echo $numStringRep?> on :"<?php echo $repString ?>"</p>
<div>file before <?php echo  $fileBeforRepStr ?></div>



<p>Save file after chenges <?php echo $save_file?></p>


<h3>File Before Chenges</h3>
<pre><?php echo $printFileBefore?></pre>


<h3>File Aftrer Chenges</h3>
<pre><?php echo $printFileAfter?></pre>
</body>
</html>
