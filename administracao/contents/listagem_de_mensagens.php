<?php

    $query = mysqli_query($conexao, "SELECT * FROM contato_empresa ORDER BY id");

?>
<div class="container-fluid">
    <div class="container-flex col-md-12">
        <h2>Contatos Realizados</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>e-mail</th>
                <th>Mensagem</th>
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
                        echo $lista['email'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $lista['mensagem'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $lista['dt_criada'];
                    ?>
                </td>
                <td>
                    <div class="pull-right" >
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=5&id=<?php echo $lista['id'] ?>"  class="btn btn-primary btn-sm" >Visializar</a>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=4&id=<?php echo $lista['id'] ?>"  class="btn btn-warning btn-sm" >Editar</a>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/del_usuario.php?id=<?php echo $lista['id'] ?>"  class="btn btn-danger btn-sm">Excluir</a>
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