<?php
require_once '../../vendor/autoload.php';

use \Aula\Classes\ConnectionDB;
use \Respect\Validation\Validator as v;
//use \Slug\Slugifier;

$connect = new ConnectionDB("mysql:host=localhost;dbname=php-crud", "root", "");
$instance = $connect->connect();

if(!empty($_POST)){
	//If the Post is not empty, it means that it is an insert from the add form
	$userNameError = null;
	$passwordError = null;
	$unidadeError = null;
	$nameError = null;
	$emailError = null;

	//getting POST data
	$userName = $_POST[username];
	$password = $_POST[password];
	$unidade = $_POST[unidade];
	$name = $_POST[name];
	$email = $_POST[email];

	//Validation using respect/validation
	$valid=true;

	if(!v::noWhitespace()->length(4, 20)->notEmpty()->validate($userName)){
		$userNameError = "Por favor digite novamente o nome de usuário, entre 4 e 20 caracteres, sem espaços em branco";
		$valid=false;
	}

	if(!v::notEmpty()->validate($password)){
		$passwordError = "Por favor digite a senha não pode ficar em branco";
		$valid=false;
	}
	
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
		$date = date('Y-m-d H:i:s'); //2015-10-15 15:12:23

		$slugfier = new \Slug\Slugifier();
		$slugfier->setTransliterate(true);
		$slug = $slugfier->slugify($name);

		$password_secure = sha1($password);


		$sql = "INSERT INTO moradores(usuario, nome, email, unidade, senha, slug, dtInsert, dtUpdate)
		        VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $instance->prepare($sql);
        $dados = [$userName, $name, $email, $unidade, $password_secure, $slug, $date, $date];
        $stmt->execute($dados);

        header('location:lista.php');
	}

}

?>


<!-- apenas para separar o código do leiaute -->

<?php include '../../partes/topo_admin_moradores.php'; ?>

                <div class="col-md-10">
                    
                    <div class="row">
                        <div class="col-md-12">
				            <div class="well">
				              <h1 id="tables">Adicionando novo morador</h1>
				            </div>
                        </div>
                    </div>


    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
                <form role="form" action="create.php" method="post">

                <div class="form-group <?php echo !empty($userNameError) ? 'has-error' : '';?>">
                    <label class="control-label" for="username">Nome de Usuário</label>
                    <input class="form-control" name="username" id="username" type="text" value="<?php echo !empty($userName) ? $userName : '';?>">
                    <?php if (!empty($userNameError)): ?>
                        <span class="text-danger"><?php echo $userNameError;?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo !empty($passwordError) ? 'has-error' : '';?>">
                    <label class="control-label" for="password">Senha</label>
                    <input class="form-control" name="password" id="password" type="password" value="<?php echo !empty($password) ? $password : '';?>">
                    <?php if (!empty($passwordError)): ?>
                        <span class="text-danger"><?php echo $passwordError;?></span>
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


