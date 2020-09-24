<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Includes/styles.css">
    <title>Vlad's Quality Instruments</title>
  </head>

  <?php include("Includes/header.html"); ?>

  <body>
      <div id="content">
          <h2><b>Add a Product</b></h2>
          <form method="post" id="addproduct" action="admin_add.php" onsubmit="return validateForm()" enctype="multipart/form-data">
		          <h3>Product Name:</h3>
              <input type="text" name="name" id="name" required/></br>
          
		          <h3>Product Description</h3>
              <textarea rows="4" cols="50" name="description"></textarea></br>

              <h3>Product Image</h3>
              <input type="file" name="image" id="image"/>

              <h3>Product's Categories</h3>

            <?php
                include("Includes/db_connect.php"); //Connect to database

                $query = "SELECT category_name FROM category;";
                $categories = mysqli_query($dbc, $query);
                $i = 1;
              
                if (!$categories) echo "Failed query" . mysqli_error($dbc);

                while ($category = mysqli_fetch_array($categories)) {
                    $currCategory = $category['category_name'];
                    echo "<label class ='radio-inline'><input type='checkbox' name='category[]' value='$currCategory'>
                        <span id='checkbox'> $currCategory</span></label>";
                
                    if ($i % 3 == 0)
                        echo "</br>";
                    $i += 1;
                }
            ?>

		        <h3>Product Price</h3>
              $ <input type="number" step="0.01" name="price" id="price" required/></br>
            
		          </br>
		          <input type="submit" value="Upload"/>
            </form>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="Includes/JavaScript/admin_add.js"></script>
  </body>
  
    <?php include("Includes/footer.html"); ?>
  
</html>