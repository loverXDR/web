<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?= $title ?></title>
		<style>
			body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 20px;
				background-color: #f5f5f5;
				color: #333;
			}
			.container {
				max-width: 1200px;
				margin: 0 auto;
			}
			.card {
				background: white;
				border-radius: 5px;
				box-shadow: 0 2px 5px rgba(0,0,0,0.1);
				margin-bottom: 20px;
				overflow: hidden;
			}
			.card-header {
				background: #0078d7;
				color: white;
				padding: 15px 20px;
			}
			.card-header h1 {
				margin: 0;
				font-size: 24px;
			}
			.card-content {
				padding: 20px;
			}
			table {
				width: 100%;
				border-collapse: collapse;
			}
			table th, table td {
				border: 1px solid #ddd;
				padding: 8px;
				text-align: left;
			}
			table th {
				background-color: #f2f2f2;
			}
			a {
				color: #0078d7;
				text-decoration: none;
			}
			a:hover {
				text-decoration: underline;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<header>
				<h1>MVC Framework Lab 6</h1>
				<nav>
					<ul style="list-style: none; padding: 0; display: flex; gap: 20px;">
						<li><a href="/hello/">Home</a></li>
						<li><a href="/test1/">Test 1</a></li>
						<li><a href="/test2/">Test 2</a></li>
						<li><a href="/test3/">Test 3</a></li>
						<li><a href="/user/all/">All Users</a></li>
						<li><a href="/products/all/">All Products</a></li>
					</ul>
				</nav>
			</header>
			
			<?= $content ?>
			
			<footer style="text-align: center; margin-top: 30px; padding: 20px; border-top: 1px solid #ddd;">
				<p>MVC Framework Lab 6 &copy; <?= date('Y') ?></p>
			</footer>
		</div>
	</body>
</html>
