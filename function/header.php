
<!DOCTYPE html>
<html lang="en">
<?php
// search product
 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">My Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="path_to_your_image1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="path_to_your_image2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="path_to_your_image3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <main>
    <div class="container">
        <h2>Search Products</h2>
        <!-- search button -->
         <?php

         ?>
        <form action="product.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search  products">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
<!-- show cart -->
<div class="container mt-5">
        <h2 class="mb-4">Your Shopping Cart</h2>
        <div class="row">
            <?php
            if (isset($_GET['search'])) {
                $search = htmlspecialchars($_GET['search']);
                include "./function/searchproduct.php";
                $products = searchProducts($search);
                
                if (!empty($products)) {
                    foreach ($products as $category) { ?>
                        <div style="padding: 30px;" class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img src="<?php echo htmlspecialchars($category['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($category['name']); ?>">
                                <div class="card-body">
                                    <h3 class="card-title font-weight-bold"><?php echo htmlspecialchars($category['name']); ?></h3>
                                    <p class="card-text text-danger"><?php echo "GIÁ SẢN PHẨM: " . htmlspecialchars($category['price']); ?> VND</p>
                                    <p class="card-text text-dark"><?php echo "MIÊU TẢ SẢN PHẨM: " . htmlspecialchars($category['status']); ?></p>
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
                                        <input type="hidden" name="name" value="<?php echo htmlspecialchars($category['name']); ?>">
                                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($category['price']); ?>">
                                        <input type="hidden" name="image" value="<?php echo htmlspecialchars($category['image']); ?>">
                                        <button type="submit" name="action" value="add" class="btn btn-outline-success btn-block">Buy</button>
                                    </form>
                                    <a href="product_detail.php?id=<?php echo htmlspecialchars($category['id']); ?>" class="btn btn-outline-info btn-block mt-2">Chi tiết sản phẩm</a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo '<p>No products found.</p>';
                }
            }
            ?>
        </div>
    </div>
</div>
    </main>
 
