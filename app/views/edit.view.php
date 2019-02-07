<?php require_once __DIR__ . '/includes/header.php'; ?>

<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form action="/update?id=<?=$post['id']?>" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="">Title</label>
						<input class="form-control" type="text" name="title" value="<?=$post['title']?>">
					</div>
					
					<? if(checkImage($post['picture'])) : ?>
						<img src="./../uploads/<?=$post['picture']?>"  alt="">
					<? endif; ?>

					<div class="form-group">
						<label for="">Change picture:</label><br>
						<input class="" type="file" name="picture">
					</div>
					
					<div class="form-group">
						<button class="btn btn-warning">Edit post</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>