
<?php
$addClass = 'todo-item-text';
	if($zadaci['stato'] == 'ready'){
		$addClass= 'done';
	}
?>




<li class="list-group-item d-flex justify-content-between"> 
			<span class="<?php echo $addClass; ?> ">  <?php echo $zadaci['text']; ?> </span>
			<form class="btn-group">
				<?php if($zadaci['stato'] == 'ready'): ?>
					<button name="action" value="rifare" class="btn btn-outline-dark btn-sm">Rifare</button>
				<?php  else: ?>
					<button  name="action" value="fatto" class="btn btn-outline-success btn-sm">Fatto</button>
				<?php  endif; ?>


				<input type="hidden" name="id" value="<?= $zadaci['id']; ?>">  <!--Ho creato un input per vedere che ID a, e lo nascosto con 'type-hidden' -->
				<button  name="action" value="delete" class="btn btn-outline-danger btn-sm">Cancella</button>
			</form>
</li>