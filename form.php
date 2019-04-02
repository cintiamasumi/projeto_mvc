<div class="container">
    <form action="?controller=ContatosController&<?php echo isset($contato->id) ? "method=atualizar&id={$contato->id}" : "method=salvar"; ?>" method="post" >
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Cadastro de novo dispositivo</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Hostname:</label>
                <input type="text" class="form-control col-sm-8" name="hostname" id="nome" value="<?php
                echo isset($contato->nome) ? $contato->hostname : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">IP:</label>
                <input type="text" class="form-control col-sm-8" name="ip" id="telefone" value="<?php
                echo isset($contato->telefone) ? $contato->ip : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo :</label>
                <input type="text" class="form-control col-sm-8" name="tipo" id="email" value="<?php
                echo isset($contato->email) ? $contato->tipo : null;
                ?>" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Fabricante :</label>
                <input type="text" class="form-control col-sm-8" name="fabricante" id="email" value="<?php
                echo isset($contato->email) ? $contato->fabricante : null;
                ?>" />
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo isset($contato->id) ? $contato->id : null; ?>" />
                <button class="btn btn-success" type="submit">Salvar</button>
                <button class="btn btn-secondary">Limpar</button>
                <a class="btn btn-danger" href="?controller=ContatosController&method=listar" title="Listagens de dispositivos">Cancelar</a>
            </div>
        </div>
    </form>
</div>