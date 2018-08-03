<div class="container-fluid">
    <div class="container col-md-6" style="padding: 10px;">
        <h2>Cadastro de Usuário</h2>
        <form method="POST"  action="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/cad_usuario.php">
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Entre com o Nome" name="nome">
            </div>
            <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" id="usuario" placeholder="Entre com o seu Usuário" name="usuario">
            </div>
            <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" placeholder="Digite a sua Senha" name="senha">
            </div>
            <div class="form-group">
            <label for="sel1">Nível de Acesso</label>
            <select class="form-control" id="nivel" name="nivel">
                <option value="1">Administrador</option>
                <option value="2">Usuário</option>
            </select>
            </div>
            <div class="form-group">
            <label for="sel1">Status</label>
            <select class="form-control" id="nivel" name="status">
                <option value="1">Ativo</option>
                <option value="0">Desativado</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary float-right">Cadastrar</button>
        </form>
    </div>
</div>