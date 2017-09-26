<form action="addingproducts.php" method="POST">
  <label>Product Name:</label>
  <input type="text" name="pro_name"/>
  <label>Product Description:</label>
  <input type="text" name="pro_description"/>
  <label>Product Price:</label>
  <input type="text" name="pro_price"/>
  <label>Product Color:</label>
  <input type="text" name="pro_color"/>
  <input type="submit" value="Submit" />
</form>
<?php
if(!empty($_POST)) {
  try {
    $db = new PDO('mysql:dbname=vechevarria_challenge;host=localhost', 'r2hstudent', 'SbFaGzNgGIE8kfP');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $eachProduct = 'INSERT INTO Products(product_name, product_descript, product_price, product_color)
      VALUES(:product_name, :product_descript, :product_price, :product_color)';
      //the values are basically placeholders

    $prepared = $db->prepare($eachProduct);
    $prepared->bindParam(':product_name',$_POST['pro_name']);
    $prepared->bindParam(':product_descript',$_POST['pro_description']);
    $prepared->bindParam(':product_price',$_POST['pro_price']);
    $prepared->bindParam(':product_color',$_POST['pro_color']);

    $prepared->execute();
    
// if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
}
?>