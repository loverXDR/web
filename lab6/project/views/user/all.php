<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>All Users</h1>
        </div>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $id => $user): ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['age'] ?></td>
                        <td><?= $user['salary'] ?></td>
                        <td>
                            <a href="/user/<?= $id ?>/">View</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 