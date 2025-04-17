<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>User #<?= $id ?> Details</h1>
        </div>
        <div class="card-content">
            <p><strong><?= ucfirst($key) ?>:</strong> <?= $value ?></p>
            <p><a href="/user/<?= $id ?>/">View all user details</a></p>
        </div>
    </div>
</div> 