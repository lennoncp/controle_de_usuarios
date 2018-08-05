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
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=9&id=<?php echo $lista['id'] ?>" type="button" class="btn btn-warning btn-sm" >Editar</a>
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                        <?php 
                            $select = mysqli_query($conexao, "SELECT * FROM situacao WHERE id=".$lista['situacao_id']);
                            $selected = mysqli_fetch_assoc($select);
                        ?>
                        <?php echo $selected['nome'] ?>
                        </button>
                        <div class="dropdown-menu">
                         <?php 
                            $situacoes = mysqli_query($conexao, "SELECT * FROM situacao");
                            while($situacao = mysqli_fetch_assoc($situacoes)){
                        ?>
                            <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/edit_prod_situacao.php?id=<?php echo $lista['id']."&situacao_id=".$situacao['id']; ?>"><?php echo $situacao['nome'] ?></a>
                        <?php
                            }
                        ?>

                        </div>
                    </div>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/del_produto.php?id=<?php echo $lista['id'] ?>" type="button" class="btn btn-danger btn-sm">Excluir</a>
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