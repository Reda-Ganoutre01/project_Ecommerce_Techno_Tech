<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header Page</title>
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="bootstrap.css">
  
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="#">Your Logo</a>

      <!-- Toggle button for small screens -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu items -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <!-- Search bar -->
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </li>
          <!-- Product -->
          <li class="nav-item">
            <a class="nav-link" href="#">Product</a>
          </li>
          <!-- Categories -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Category 1</a>
              <a class="dropdown-item" href="#">Category 2</a>
              <a class="dropdown-item" href="#">Category 3</a>
            </div>
          </li>
          <!-- Contact Us -->
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
        </ul>
        
        <!-- Icons -->
        <ul class="navbar-nav">
          <!-- User Icon -->
          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <img  style="width:22px;" src="icons/icons-header/user (1).png"/>
            </a>
          </li>
          <!-- Heart Icon -->
          <li class="nav-item">
            <a class="nav-link" href="#">
                <img  style="width:22px;" src="icons/icons-header/heart.png"/>
            </a>
          </li>
          <!-- Command Icon -->
          <li class="nav-item">
            <a class="nav-link" href="#">
                <img  style="width:22px;" src="icons/icons-header/shopping-cart.png"/>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

<!-- Bootstrap JS (optional, for dropdowns and other components) -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-UKS0OcK2GKYLpImMHpUH/CGFjauG5eqBEhWkhDZI3rT7EnGMlOzvljNBR69tL2FrDEPp56mN3UAl41BcX+YsMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --> -->

</body>
</html>