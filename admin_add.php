<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Includes/styles.css">
    <title>Add Product</title>
  </head>

    <?php include("Includes/header.html"); ?>

<body>
    <div id='content'>
<?php
  
    // Inserting into product table
    $name = strip_tags($_POST['name']);
    $image = $_POST['image'];
    $desc = strip_tags($_POST['description']);
    $price = strip_tags($_POST['price']);
    
    //connect to database
    include("Includes/db_connect.php");

    // gets Uploaded image from array
    $tmp_name = $_FILES['image']['tmp_name'];
    $new_file = 'Includes/Images/'.$_FILES['image']['name'];
    
    //Moves uploaded image to the Images directory
    if (move_uploaded_file($tmp_name, $new_file)) echo 'File Uploaded ';
    else echo 'File did not upload ';
    
    //create query
    $query = "INSERT INTO product(product_name, description, image, price)
                VALUES ('$name', '$desc', '$new_file', $price);";

    //run query
    $result = mysqli_query($dbc, $query);

    // Display sql db error
    if (!$result) echo "Failed to add product. " . mysqli_error($dbc);

    // Inserting into product_category
    $checkboxes = $_POST['category'];
    $product_array = mysqli_query($dbc, "SELECT product_id FROM product WHERE product_name = '$name';");

    //inform user of success/failure
    if (!$checkboxes) echo "Failed to obtain checkboxes. ";

    if (!$product_array) echo "Failed to get product ID. " . mysqli_error($dbc);
    
    while ($product = mysqli_fetch_array($product_array)) {
        $product_id = $product['product_id'];

        foreach ($checkboxes as $checkbox) {
            $category_array = mysqli_query($dbc, "SELECT category_id FROM category WHERE category_name = '$checkbox';");

            //inform user of success/failure
            if (!$category_array) echo "Failed to get category ID. " . mysqli_error($dbc);

            while ($category = mysqli_fetch_array($category_array)) {
                $category_id = $category['category_id'];

                $query = "INSERT INTO product_category(product_id, category_id)
                          VALUES ($product_id, $category_id);";

                $result = mysqli_query($dbc, $query);

                //inform user of success/failure
                        }
                    }
                }

            ?>
        </div>
    </body>

    <?php include("Includes/footer.html"); ?>

</html>