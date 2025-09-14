<?php
	require_once('./config.php');
	require_once('./db.php');


// CREAZIONI DI IMPEGNI
//controllo se POST a ricevuto info E    
if(isset($_POST['title']) && !empty(trim($_POST['title']))){
	$impegno = R::dispense("tasks");  // crea nuovo record
	$impegno ->text= $_POST['title']; //agg info sulla colona 'text' nel db
	$id =R::store($impegno);		  // salva record
}


//CANCELLA IMPEGNI
if(isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])){  //se esiste un 'action' E action e 'delete' E essiste un 'ID'
	$impegno= R::load('tasks',$_GET['id']);
	R::trash($impegno);
}

?>

<!DOCTYPE html>
<html lang="ru">

	<!-- Head -->
<?php include(ROOT .'templates/page_partes/head.tpl' ); ?>
<body class="todo-app p-5">

	<!-- Header -->
	<?php include(ROOT.'templates/page_partes/header.tpl') ?>

		<!-- List -->
		<ul class="list-group mb-3">
			
				<?php
					$dinTabela = R::findAll('tasks');  //cava tutte cose da fare dal DB
					
					if(empty($dinTabela)){
						include(ROOT .'templates/emply.tpl');  //quando e vuota
					} else {
						foreach($dinTabela as  $zadaci){
							include(ROOT . 'templates/task.tpl');  //quando ci sono cose da fare
						}
					}
				
				?>
		</ul>

			<!-- Forma -->
	<?php include(ROOT.'templates/page_partes/form.tpl') ?>

</body>
</html>
