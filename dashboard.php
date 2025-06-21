<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Ropa - Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #111827;
        }
        .navbar-brand, .nav-link {
            color: white;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #e5e7eb;
        }
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            margin-bottom: 50px;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #111827;
            margin-bottom: 10px;
        }
        .btn-logout {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            margin-top: 10px;
        }
        .btn-logout:hover {
            background-color: #b91c1c;
        }
        .product-card {
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }
        .product-card:hover {
            transform: scale(1.03);
        }
        .product-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-select {
            background-color: #111827;
            color: white;
            border-radius: 20px;
        }
        .btn-select:hover {
            background-color: #1f2937;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">FashionStore</a>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-logout">Cerrar sesión</a>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Perfil -->
    <div class="profile-card">
        <img src="<?php echo $_SESSION['foto']; ?>" class="profile-img" alt="Foto">
        <h4 class="fw-bold"><?php echo htmlspecialchars($_SESSION['nombre']); ?></h4>
        <p class="text-muted mb-1"><?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <small class="text-muted">¡Bienvenido a tu tienda de moda!</small>
    </div>


    <!-- Catálogo de Polos -->
    <h3 class="mb-4 text-center">🛍️ Escoge tu Polo Favorito</h3>
    <div class="row g-4">
        <?php
        // Lista simulada de productos
        $productos = [
            ["nombre" => "Polo Azul Clásico", "precio" => "S/49.90", "img" => "https://hmperu.vtexassets.com/arquivos/ids/5440548/Polo-oversize-con-motivo-estampado---Negro-Formula-1---H-M-PE.jpg?v=638845718077000000"],
            ["nombre" => "Polo Aqua Moderno", "precio" => "S/55.00", "img" => "https://oechsle.vteximg.com.br/arquivos/ids/12685782/imageUrl_2.jpg?v=638053554081130000"],
            ["nombre" => "Polo Marino Elegante", "precio" => "S/59.90", "img" => "https://rimage.ripley.com.pe/home.ripley/Attachment/MKP/4652/PMP20000367103/full_image-2.png"],
            ["nombre" => "Polo Verde Orgánico", "precio" => "S/52.00", "img" => "https://storeinpe.com/cdn/shop/products/lacostemujerrojo.png?v=1741460557"],
        ];


        foreach ($productos as $p) {
            echo '<div class="col-md-4 col-lg-3">';
            echo '<div class="card product-card">';
            echo '<img src="' . $p["img"] . '" class="card-img-top product-img" alt="' . $p["nombre"] . '">';
            echo '<div class="card-body text-center">';
            echo '<h5 class="card-title">' . $p["nombre"] . '</h5>';
            echo '<p class="text-success fw-semibold">' . $p["precio"] . '</p>';
            echo '<a href="#" class="btn btn-select">Elegir</a>';
            echo '</div></div></div>';
        }
        ?>
    </div>
</div>

</body>
</html>
