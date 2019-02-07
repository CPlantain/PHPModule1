<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form action="/store" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="">Title</label>
						<input class="form-control" type="text" name="title">
					</div>

					<div class="form-group">
						<label for="">Choose picture:</label><br>
						<input class="" type="file" name="picture">
					</div>
					
					<div class="form-group">
						<button class="btn btn-success">Add post</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>