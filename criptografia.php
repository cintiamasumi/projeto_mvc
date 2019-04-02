<h1 class="text-center">Criptografia</h1>
<hr>
<div class="container">
<div class="row">
    <div class="col-md-6">
        <form action="?controller=ContatosController&method=cifra_cesar" method="post" >
        <h4>Criptografar</h4>
            <textarea class="form-control" name="texto" rows="3"></textarea>
            <br><br>
            <button class="btn btn-primary btn-sm" type="submit">Criptografar</button>
        </form>
        <?php if(!empty($dados->cesar)):?>
                <ul>
                    <li>1° Cifra de Cesar: <?= $dados->cesar ?></li>
					<li>2° AES256  : <?= $dados->aes256 ?></li>
                </ul>
            <?php endif?>
        </div>
        <div class="col-md-6">
        <form action="?controller=ContatosController&method=descriptografia" method="post" >
            <h4>Descriptografar</h4>
            <input type="hidden" name="textocesar" value="<?= $dados->cesar ?>">
			<input type="hidden" name="textoaes256" value="<?= $dados->aes256 ?>">
			
            <button class="btn btn-primary btn-sm" type="submit">Criptografar</button>
            <?php if(!empty($dados->descesar)):?>
			<br><br>
                <ul>
                    <li>1° Descriptografia Cifra de Cesar: <?= $dados->descesar ?></li>
					<li>2° Descriptografia AES256 SALT: <?= $dados->teste ?></li>
                </ul>
            <?php endif?>
        </form>
    </div>
    </div>
	<hr>
    <a href="?controller=ContatosController&method=listar" class="btn btn-success">Listagem</a>
</div>
