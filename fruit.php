<?php
$connection = mysqli_connect('localhost','website','password','data');
/**check connection**/
if($connection){
    echo "connected!";
}
else{
    echo "not connected";
}
//query
$query = "SELECT * FROM fruit";
//prepare the query
$statement = $connection ->prepare($query);
$statement->execute();
$result = $statement->get_result();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id = $row['fruit_Id'];
        $name = $row['name'];
        $color = $row['color'];
        $organic = $row['isOrganic'];
        $price = $row['price'];
        echo "<h4>$name</h4>";
        echo "<p>color = $color</p>";
        echo "<p>price $ = $price</p>";
        
    }
}
?>