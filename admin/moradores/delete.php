<?php

require_once '../../vendor/autoload.php';
use \Aula\Classes\ConnectionDB;

$connect = new ConnectionDB("mysql:host=localhost;dbname=php-crud", "root", "");
$instance = $connect->connect();
$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!empty($_POST)){
	$id = $_POST['id'];
	$sql = 'DELETE FROM moradores WHERE id=?';
	$stmt = $instance->prepare($sql);
	$stmt->execute([$id]);
	header('location:lista.php');

}else{
	$id=$_GET['id'];
	$sql = 'SELECT * FROM moradores WHERE id=?';
	$stmt = $instance->prepare($sql);
	$stmt->execute([$id]);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	$name = $data['nome'];
	$unidade = $data['unidade'];
	$id = $data['id'];
}

?>

<!-- apenas para separar o código do leiaute -->

<?php include '../../partes/topo_admin_moradores.php'; ?>

                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-12">
				            <div class="well">
				              <h1 id="tables">Confirma excluir <?php echo $name ?> [<?php echo $unidade ?>] ?</h1>
				            </div>
                        </div>
                    </div>


    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <form role="form" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <p class="alert alert-error">Tem certeza que quer excluir <?php echo $name ?> [<?php echo $unidade ?>] ?</p>
                <div class="well">
                	<button type="submit" class="btn btn-danger">Sim</button>
                	<a class="btn btn-default" href="lista.php">Não</a>
            	</div>
        	</form>
    	</div>
	</div>


<?php include '../../partes/rodape.php'; ?>