<?php
require_once '../../vendor/autoload.php';

use \Aula\Classes\ConnectionDB;
use \Respect\Validation\Validator as v;
//use \Slug\Slugifier;

$connect = new ConnectionDB("mysql:host=localhost;dbname=php-crud", "root", "");
$instance = $connect->connect();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
}



if(!empty($_POST)){
	//If the Post is not empty, it means that it is an insert from the add form
	$userNameError = null;
	$passwordError = null;
	$unidadeError = null;
	$nameError = null;
	$emailError = null;

	//getting POST data
	$username = $_POST[username];
	$password = $_POST[password];
	$unidade = $_POST[unidade];
	$name = $_POST[name];
	$email = $_POST[email];
	$id = $_POST[id];

	//Validation using respect/validation
	$valid=true;

	if(!v::noWhitespace()->length(4, 20)->notEmpty()->validate($username)){
		$userNameError = "Por favor digite novamente o nome de usuário, entre 4 e 20 caracteres, sem espaços em branco";
		$valid=false;
	}

/*
	if(!v::notEmpty()->validate($password)){
		$passwordError = "Por favor digite a senha não pode ficar em branco";
		$valid=false;
	}
	
*/
	if(!v::notEmpty()->length(1, 5)->validate($unidade)){
		$unidadeError = "Por favor digite novamente o unidade, no formato A-00 (letra, traço e número)";
		$valid=false;
	}

	if(!v::length(3, 80)->notEmpty()->validate($name)){
		$nameError = "Por favor digite novamente o nome do morador, entre 3 e 80 caracteres";
		$valid=false;
	}

	if(!v::email()->validate($email)){
			$emailError = "O e-mail informado não é válido.";
		$valid=false;	
	}

	if($valid){
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $date = date('Y-m-d H:i:s');

		$slugfier = new \Slug\Slugifier();
		$slugfier->setTransliterate(true);
		$slug = $slugfier->slugify($name);

		//$password_secure = sha1($password);


		$sql = "UPDATE moradores SET usuario=?, nome=?, email=?, unidade=?, slug=?, dtUpdate=? WHERE id = ?";

        $dados = [$username, $name, $email, $unidade, $slug, $date, $id];

        $stmt = $instance->prepare($sql);
        $stmt->execute($dados);

        header('location:lista.php');


	}

} else {

	$sql = "SELECT * FROM moradores WHERE id = ?";
	$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $instance->prepare($sql);
	$stmt->execute([$id]);
	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	$username = $data[usuario];
	$unidade = $data[unidade];
	$name = $data[nome];
	$email = $data[email];
	$id = $data[id];

}

?>


<!-- apenas para separar o código do leiaute -->

<?php include '../../partes/topo_admin_moradores.php'; ?>

                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-12">
				            <div class="well">
				              <h1 id="tables">Atualizando dados de <?php echo $name ?> [<?php echo $unidade ?>]</h1>
				            </div>
                        </div>
                    </div>


    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <form role="form" action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo !empty($id) ? $id : '';?>">
               
                <div class="form-group <?php echo !empty($userNameError) ? 'has-error' : '';?>">
                    <label class="control-label" for="username">Nome de Usuário</label>
                    <input class="form-control" name="username" id="username" type="text" value="<?php echo !empty($username) ? $username : '';?>">
                    <?php if (!empty($userNameError)): ?>
                        <span class="text-danger"><?php echo $userNameError;?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($unidadeError) ? 'has-error' : '';?>">
                    <label class="control-label" for="unidade">Unidade</label>
                    <input class="form-control" name="unidade" id="unidade" type="text" value="<?php echo !empty($unidade) ? $unidade : '';?>">
                    <?php if (!empty($unidadeError)): ?>
                        <span class="text-danger"><?php echo $unidadeError;?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($nameError) ? 'has-error' : '';?>">
                    <label class="control-label" for="name">Nome completo do morador</label>
                    <input class="form-control" name="name" id="name" type="text" value="<?php echo !empty($name) ? $name : '';?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="text-danger"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($emailError) ? 'has-error' : '';?>">
                    <label class="control-label" for="email">E-Mail</label>
                    <input class="form-control" name="email" id="email" type="text" value="<?php echo !empty($email) ? $email : '';?>">
                    <?php if (!empty($emailError)): ?>
                        <span class="text-danger"><?php echo $emailError;?></span>
                    <?php endif; ?>
                </div>

                <div class="well">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a class="btn btn-default" href="lista.php">Voltar</a>
                </div>
            </form>
        </div>
    </div>




<?php include '../../partes/rodape.php'; ?>


