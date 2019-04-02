<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <header>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8"/>
        <title>Controle de Dispositivos</title>
		<style>
		<?php include 'boostrap4.css'; ?>
		</style>
		<script>
		<?php include 'boostrap4.js'; ?>
		</script>
    </header>
    <body>

        <?php
        if ($_GET) {
            $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
            $method     = isset($_GET['method']) ? $_GET['method'] : null;
            if ($controller && $method) {
                if (method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['controller']);
                    unset($parameters['method']);
                    call_user_func(array($controller, $method), $parameters);
                } else {
                    echo "Método não encontrado!";
                }
            } else {
                echo "Controller não encontrado!";
            }
        } else {
            echo '<h1 class="text-center">Projeto MVC</h1><hr><div class="container">';
            echo 'Bem-vindo ao aplicativo MVC ! <br /><br />';
            echo '<a href="?controller=ContatosController&method=listar" class="btn btn-success">Listagens Dispositivos</a> &nbsp;';
            echo '<a href="?controller=ContatosController&method=criptografia" class="btn btn-info">Criptografia</a></div>';
        }
        ?>


    </body>
</html>