<html>
<head>
<title>Add Product </title>
</head>
<body>
<?php
    $name = strip_tags($_GET['name']);
    $desc = strip_tags($_GET['description']);
    $image = strip_tags($_GET['image']);
    $category = strip_tags($_GET['category']);
    $price = strip_tags($_GET['price']);

    //connect to database
    include("db_connect.php");

    //create query
    $query = "INSERT INTO product(product_name, description, image, price)
                VALUES ('$name', '$desc', '$image', $price);";

    //run query
    @mysqli_query($dbc, $query);
?>

</body>
</html>