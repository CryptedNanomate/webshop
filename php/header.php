<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<header id="header">
    <link rel="stylesheet" href="css.css">
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
            Tech-Trade
            <i class="fas fa-robot"></i>
            </h3>

        </a>
  
        <button class="navbar-toggler"
        
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon">
                
            </span>

            
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mr-auto ">
              
              <li class="nav-item h6">
                <a class="nav-link text-light" href="laptops.php">LapTops</a>
              </li>
              <li class="nav-item h6">
                <a class="nav-link text-light " href="monitors.php">Monitors</a>
              </li>
              <li class="nav-item h6">
                <a class="nav-link text-light" href="gpu.php">GPU</a>
              </li>
              <li class="nav-item h6">
                <a class="nav-link text-light" href="cpu.php">Processors</a>
              </li>
              <!-- <li class="nav-item h6">
                <a class="nav-link text-light" href="gaming.php">Gaming equipment</a>

            
              </li> -->
              <li class="nav-item h6">
                <a class="nav-link text-light" href="about.php">About us</a>
              </li>
           

            </ul>
            <div class="mr-auto">
            </div>
            <a href="login-2.php"><i class="far fa-user-circle text-light h6"> Register or Login</i></a>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\">$count</span>";
                        }else{  
                            echo "<span id=\"cart_count\">0</span>";
                        }

                        ?>
                    </h5>
                    </a>
                    
            </div>
        </div>
                    
    </nav>
</header>






