<form id="states">
  <label>First Name:</label>
    <input type="text" name="fname" id="fname" />
  <label>Last Name:</label>
    <input type="text" name="lname" id="lname" />
  <input type="submit" />
  </form>
  <select name="statesList" form="states">
  <?php
  try {
    $db = new PDO('mysql:dbname=challenge;host=localhost', 'root', 'root');
    $eachState = 'SELECT state_name FROM States';
    //For each result of query ($eachState, which will return everything in the table) make it $state and echo it as an option.
    foreach($db->query($eachState) as $state) {
        echo "<option value=\"{$state['state_name']}\">" . $state['state_name'] . "</option>";
    }
// if an exception occurs, it will get passed to the catch block and php will execute the code inside the catch block
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
?>
  </select>

  
