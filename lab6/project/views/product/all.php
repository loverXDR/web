<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>All Products</h1>
        </div>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Total Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $id => $product): ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['price'] ?>$</td>
                        <td><?= $product['quantity'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['price'] * $product['quantity'] ?>$</td>
                        <td>
                            <a href="/product/<?= $id ?>/">View</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 