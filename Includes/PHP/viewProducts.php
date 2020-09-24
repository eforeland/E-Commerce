<html>
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
  <header>
    <nav class="navbar navbar-light bg-light">
          <div id="title">
            <a class="navbar-brand" href="index.html">
              <img width="40" height="40" class="d-inline-block align-top" alt="">
              Vlad's Quality Instruments 
            </a>
          </div>
          <div id="slogan">The home of all your Instrument needs!</div>
          <div id="navigation">
              <h3 id="greeting">Welcome, Vladamir! </h3>
              <button id="addproduct" onclick="location.href='admin_add.html'">Add Product</button>
              <div class="dropdown">
                  <button class="dropbtn">Account</button>
                  <div class="dropdown-content">
                    <a href="cart.html">My Cart</a>
                    <a href="orderhistory.html">Order History</a>
                  </div>
              </div>
              <button id="signout">Sign Out</button>
          </div>
    </nav>
  </header>
  <body>
  </html>

  <?php
  
  require_once('../db_connect.php');

  $query = "SELECT product_name, price, description FROM product";

  $result = @mysqli_query($dbc, $query);

  if($result) {
    echo '<table align="left"
    cellspacing="5" cellpadding="8">

    <tr>
      <td align="left"><b>Product Name</b></td>
      <td align="left"><b>Price</b></td>
      <td align="left"><b>Descripition</b></td>
    </tr>';

    while($row = mysqli_fetch_array($result)) {
      echo '<tr><td align="left">' .
      $row['product_name'] . '</td><td align="left">' . 
      $row['price'] . '</td><td align="left">' . 
      $row['description'] . '</td><td align="left">';

      echo '</tr>';
    }

    echo '</table>';

  } else {
    echo "Database connection failed";
    echo mysqli_error($dbc);
  }
  mysqli_close($dbc);

  ?>
  <html>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="Includes/JavaScript/index.js"></script>
  </body>
  <footer>
      <table>
          <tr>
              <td >Copyright &copy; 2019. All rights reserved</td>
          </tr>
      </table>
  </footer>
</html>