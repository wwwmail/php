<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo TITLE;?></title>
    
  </head>
  <body>
  <h3 style="color:red"><?php echo $error ?> </h3>
<form  action="/~user4/php/task1/index.php" method="post"  enctype="multipart/form-data">

  <input type="file" name="file_name" >
  
  <input type="submit" value="Submit">
</form>


<table border=1>
    <tr>
        <th>N</th>
        <th>File name</th>
        <th>Size</th>
        <th>Command</th>
    </tr> 
<?php foreach ($files as $item){?>
    <tr>
    <td><?php echo $item['number']?></td>
        <td><?php echo $item['name']?></td>
        <td><?php echo $item['size']?></td>
        <td>
            <form method="post" action="/~user4/php/task1/index.php">
            <input name="file_name_for_del" type="hidden" value= <?php echo $item['path_to_file']?>>
            <input type="submit" name="del_file" value="Delete file">
            </form>
        </td>
    </tr>
<?php }?>
</table>
    <!-- page content -->
  </body>
</html>

