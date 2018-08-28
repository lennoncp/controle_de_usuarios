<?php

    $query = mysqli_query($conexao, "SELECT * FROM usuarios ORDER BY id");

?>
<div class="container-fluid">
    <div class="container col-md-10">
        <h2>Listagem de Usuários</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Usuário</th>
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
                        echo $lista['usuario'];
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
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=5&id=<?php echo $lista['id'] ?>"  class="btn btn-primary btn-sm" >Visializar</a>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=4&id=<?php echo $lista['id'] ?>"  class="btn btn-warning btn-sm" >Editar</a>
                    <?php
                        if($lista['status'] == 1){
                    ?>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/edit_usuario.php?link=4&id=<?php echo $lista['id'] ?>&bt=true&status=0"  class='btn btn-success btn-sm' >Desativar</a>
                    <?php
                        }else{
                    ?>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/edit_usuario.php?link=4&id=<?php echo $lista['id'] ?>&bt=true&status=1"  class='btn btn-secondary btn-sm' >Ativar</a>
                    <?php
                        }
                    ?>
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