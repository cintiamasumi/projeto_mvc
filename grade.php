<h1>Listagem de Dispositivos cadastrados</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
            <tr>
                <th>Hostname</th>
                <th>IP</th>
                <th>Tipo </th>
                <th>Fabricante</th>
                <th><a href="?controller=ContatosController&method=criar" class="btn btn-success btn-sm">Novo</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($contatos) {
                foreach ($contatos as $contato) {
                    ?>
                    <tr>
                        <td><?php echo $contato->hostname; ?></td>
                        <td><?php echo $contato->ip; ?></td>
                        <td><?php echo $contato->tipo; ?></td>
						<td><?php echo $contato->fabricante; ?></td>
                        <td>
                            <a href="?controller=ContatosController&method=editar&id=<?php echo $contato->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?controller=ContatosController&method=excluir&id=<?php echo $contato->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">Nenhum registro encontrado</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <a href="?controller=ContatosController&method=criptografia" class="btn btn-primary btn-sm">Criptografia</a>
</div>
