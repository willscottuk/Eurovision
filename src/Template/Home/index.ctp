<?php
/**
  * @var \App\View\AppView $this
  */
?>
<main>
	<div class="container">
		<div class="col-12">
			<h1>Eurovision <?php echo date("Y"); ?></h1>
			<p>Vote along below!</p>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th>#</th>
			      <th>&nbsp;</th>
			      <th>Country</th>
			      <th>Score</th>
			      <th>Edit</th>
			    </tr>
			  </thead>
			  <tbody>
			<?php
			foreach ($voterecord as $vote){
				$average_score = 0;
			?>
				<tr>
					<th scope="row"><?PHP echo $vote['position']; ?></th>
					<td><img src="/img/flags-iso/flat/32/<?PHP echo $vote['flag']; ?>.png" alt="<?PHP echo $vote['name']; ?>"/> </td>
					<td><?PHP echo $vote['name']; ?></td>
					<td>
						<?PHP
						if($vote['vote_id']){
							$average_score = ($vote['overall_score'] + $vote['song_score'] + $vote['singer_score'] + $vote['staging_score']) / 4;
							echo $average_score;
						}
						else {
						?>
						...
						<?PHP
						}
						?>
					</td>
					<td>
						<?PHP
						if($vote['vote_id']){ ?>
							<a href="/votes/edit/<?PHP echo $vote['vote_id']; ?>">Edit</a>
						<?PHP }
						else {
						?>
						<a href="/votes/add/<?PHP echo $vote['country_id']; ?>">Vote</a>
						<?PHP
						}
						?>
					</td>
				</tr>
			<?PHP
			}
			?>
			  </tbody>
			</table>
		</div>
	</div>
</main>
