<?php

    $query = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY id");

?>
<div class="container-fluid">
    <div class="container-fluid col-md-12">
        <div class="form-inline">
            <h2>Listagem de Produtos</h2>
            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=8" type="button" class="btn btn-primary btn-md" >Novo Produto</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição curta</th>
                <th>preço</th>
                <th>tags</th>
                <th>Description</th>
                <th>Data Criação</th>
                <th>Data Modificação</th>
                <th>ações</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                while($lista = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td>
                <?php 
                        echo $lista['id'];
                    ?>
                </td>
                <td>
                <?php 
                        echo $lista['nome'];
                    ?>
                </td>
                <td>
                <?php 
                        echo $lista['descricao_curta'];
                    ?>
                </td>
                <td>
                <?php 
                        echo $lista['preco'];
                    ?>
                </td>
                <td>
                <?php 
                        echo $lista['tag'];
                    ?>
                </td>
                <td>
                <?php 
                        echo $lista['description'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $lista['criado'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $lista['modificado'];
                    ?>
                </td>
                <td>
                    <div class="pull-right" >
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=5&id=<?php echo $lista['id'] ?>" type="button" class="btn btn-primary btn-sm" >Visializar</a>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=4&id=<?php echo $lista['id'] ?>" type="button" class="btn btn-warning btn-sm" >Editar</a>
                    <?php
                        if($lista['situacao_id'] == 1){
                    ?>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/edit_usuario.php?link=4&id=<?php echo $lista['id'] ?>&bt=true&status=0" type='button' class='btn btn-success btn-sm' >Desativar</a>
                    <?php
                        }else{
                    ?>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/edit_usuario.php?link=4&id=<?php echo $lista['id'] ?>&bt=true&status=1" type='button' class='btn btn-secondary btn-sm' >Ativar</a>
                    <?php
                        }
                    ?>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/del_usuario.php?id=<?php echo $lista['id'] ?>" type="button" class="btn btn-danger btn-sm">Excluir</a>
                    </div>
                </td>
            </tr>
            <?php 
                }
            ?>
            </tbody>
        </table>
    </div>
</div>