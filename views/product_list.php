<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="views/css/styles.css">
</head>

<body>
    <h1>Catálogo de Productos</h1>

    <main>
        <?php if ($errorMessage): ?>
            <div class="alert alert-error">
                <strong>¡Error!</strong>
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>


        <?php if (empty($products)): ?>
            <div class="empty-state">
                <p>No hay productos disponibles en este momento.</p>
            </div>
        <?php else: ?>
            <div class="products">
                <?php foreach ($products as $product): ?>
                    <div class="product">
                        <h3><?php echo $product->getDescription(); ?></h3>
                        <div class="price">$<?php echo $product->getPrice(); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="info">
                <p>
                    Total de productos:
                    <strong><?php echo $totalProducts; ?></strong>
                </p>
            </div>
        <?php endif; ?>
    </main>

</body>

</html>