<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Продукт "<?= $product['name'] ?>" из категории "<?= $product['category'] ?>"</h1>
        </div>
        <div class="card-content">
            <p>
                Цена: <?= $product['price'] ?>$, количество: <?= $product['quantity'] ?>
            </p>
            <p>
                Стоимость (цена * количество): <?= $totalCost ?>$
            </p>
            <p><a href="/products/all/">Посмотреть все продукты</a></p>
        </div>
    </div>
</div> 