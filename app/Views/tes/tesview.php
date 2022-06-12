<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test View</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>npm</th>
				<th>name</th>
				<th>address</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mhs as $i => $mha): ?>
				<tr>
					<td><?php echo $mha->id ?></td>
					<td><?php echo $mha->npm ?></td>
					<td><?php echo $mha->name ?></td>
					<td><?php echo $mha->address ?></td>
					<td>
						<a href="">Edit</a>
						<a href="">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>