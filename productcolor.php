<h1>Search for a product color<h1>
<form action="productcolor.php" method="GET">
  <select name="colors">
    <option value="grey">Grey</option>
    <option value="black">Black</option>
    <option value="purple">Purple</option>
    <option value="blue">Blue</option>
    <option value="green">Green</option>
  </select>
  <input type="submit" value="Submit" />
</form>
<div>
<?php
if(!empty($_GET)) { 
  try {
    $db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
    //If there are any errors this line will show you them
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $colors = 'SELECT product_name, product_descript, product_price, product_color FROM Products WHERE product_color= :colors ';
    
    //prepare() preps a statement, in this case it is $colors, for execution and returns a statement object
    $prepared = $db->prepare($colors);
    $prepared->bindParam(':colors', $_GET['colors']);

    $prepared->execute();
    
   foreach($prepared->fetchAll() as $color) {
    echo "<p>{$color['product_name']}, {$color['product_color']}</p>";
}

    // if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
}
?>
</div>