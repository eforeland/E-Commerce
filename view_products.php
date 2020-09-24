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
    <div id='content'>
        <h3><b>Choose Category To Browse By</b></h3>
    <?php
    //connect to database
    include("Includes/db_connect.php");
    
    $query = "SELECT category_name from category;";
    $rows = mysqli_query($dbc, $query);
    $i = 1;

    echo "<form id='filters' action='' method='GET'>";
    while ($row = mysqli_fetch_array ($rows, MYSQLI_BOTH)) {

        echo "<input type='submit' value='{$row[0]}' id='category_btn' name='selectedcategory'>";

        if ($i % 2 == 0) echo "<br>";
        $i += 1;
    }
    echo "<input type='submit' value='View All' id='category_btn' name='selectedcategory' align='left'>";
    echo "</form>";
    echo "</div>";

    if (isset($_GET['selectedcategory'])) {
      $selectedcategory = $_GET['selectedcategory'];
      
      if ($selectedcategory == 'View All') {
          $query = "SELECT product_name, description, image, price FROM product ORDER BY product_name;";
      } else {
          $query = "SELECT product_name, description, image, price FROM product p inner join product_category pc on 
                    (p.product_id = pc.product_id) inner join category c on (pc.category_id = c.category_id)
                    where category_name = '$selectedcategory' ORDER BY product_name;";
      }

      //run query
      $rows = mysqli_query($dbc, $query);
      
      echo "<div id='content'>
            <table class='table table-bordered'>
            <thead class='thead-light'>
            <tr><td scope='col'></td><th scope='col'>Product</th><th scope='col'>Description</th><th scope='col'>Image</th><th scope='col'>Price</th></tr></thead>
            <tbody>
			<form method='post' action='add_cart.php'>";
      while($row = mysqli_fetch_array($rows, MYSQLI_ASSOC)) {
          //echo "<tbody>";
          echo "<tr class='table-light'>";
		  echo "<td> <input type='checkbox' name='checked[]' value='$row'></td>";
          echo "<th scope='col'>".$row['product_name']."</th>";
          echo "<td>".$row['description']."</td>";
          echo "<td><img class='thumbnail' src='".$row['image']."'></td>";
          echo "<td>$".$row['price']."</td>";
          echo "</tr>";
          //echo "</tbody>";
      }
      echo "</form></tbody></table></div>";
      mysqli_close($dbc);
    }
    ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="Includes/JavaScript/index.js"></script>
  </body>
  
  <?php include("Includes/footer.html"); ?>

</html>