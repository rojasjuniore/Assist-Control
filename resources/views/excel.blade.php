<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ route('excel.store') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="file" name="csv">
		<button type="file">dsada</button>
	</form>
</body>
</html>