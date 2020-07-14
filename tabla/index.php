<!-- Conexion a base de datos -->
<?php 
    $conex = mysqli_connect("127.0.0.1", "root", "", "tienda");

    if (!$conex) {
        echo "<p>Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        echo "</p>";
        exit;
    }
?>
<!-- empieza html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo Deber</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Tienda Rosita</a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="#portfolio">Productos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/portfolio/tienda-ico.png" alt="" />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">La mejor tienda de su localidad</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Bebidas - Galletas - Frutas</p>
        </div>
    </header>
    <section class="page-section portfolio" id="portfolio">
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <!-- Portfolio Section Heading-->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Productos</h2>
                    <!-- Icon Divider-->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <table border="5">
                        <tr>
                            <td>Codigo</td>
                            <td>Nombre</td>
                            <td>Cantidad</td>
                            <td>Costo Unitario</td>
                            <td>Costo Total</td>
                        </tr>
                        <?php 
                    $result = $conex->query("SELECT * FROM productos");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row["Codigo"] ?></td>
                            <td><?php echo $row["Nombre"] ?></td>
                            <td><?php echo $row["Cantidad"] ?></td>
                            <td><?php echo $row["CostUnit"] ?></td>
                            <td><?php echo $row["CostTot"] ?></td>
                        </tr>
                        <?php } 
                        } else {?>
                        <tr>
                            <td colspan="5">No hay datos</td>
                        </tr>
                        <?php }?>
                    </table>

                </div>
            </div>

        </div>
    </section>

</body>

</html>