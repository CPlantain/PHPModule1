<?php require_once __DIR__ . '/includes/header.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<a href="/create" class="btn btn-success my-3">Add Post</a>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Title</th>
				      <th scope="col">Image</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<? foreach($posts as $post): ?>
						<tr>
					      <th scope="row"><?= $post['id']; ?></th>
					      <td><a href="/show?id=<?=$post['id']?>"><?= $post['title']; ?></a></td>
					      <td>
					      	<?if(checkImage($post['picture'])) : ?>
					      		<img src="./../uploads/<?=$post['picture']?>"  alt="">
					        <? endif; ?>
					      	</td>
					      <td>
							<a href="edit?id=<?=$post['id']?>" class="btn btn-warning">Edit</a>
							<a href="/delete?id=<?=$post['id']?>" class="btn btn-danger" onclick="return confirm('are you sure?')">Delete</a>
					      </td>
					    </tr>
				  	<? endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>