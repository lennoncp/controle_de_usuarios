<?php
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
        $query = mysqli_query($conexao, "SELECT * FROM situacao WHERE id='$id' ");
        $resultado = mysqli_fetch_array($query);
    }else{
        $resultado['id'] = "";
        $resultado['nome'] = "";
    }
?>
<style>
.sombra {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) ;
}
</style>
<div class="container-fluid">
    <div class="row" style="padding: 10px;">
        <div class="col-sm-3 col-md-3 sombra" style="width: 400px; height: 150px; margin-left: 0; ">
            <h3>Cadastro de Situação</h3>
            <form method="POST"  action="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/situacao/mantem_situacao.php?">
                <div class="form-group">

                <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $resultado['id'] ?>">

                <input type="text" class="form-control sombra" id="nome" placeholder="Entre com a Situação" name="nome" value="<?php echo $resultado['nome'] ?>">
                </div>
                <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11" class="btn btn-primary sombra float-right" style="margin: 1px;">Nova</a>
                <button type="submit" class="btn btn-primary sombra float-right" style="margin: 1px;">Salvar</button>
            </form>
        </div>
        <div class="col-sm-3 col-md-9">
            <h2>Listagem de Situções</h2>
            <table class="table table-hover">
            <thead>
            <tr >
                <th>ID</th>
                <th>Situação</th>
                <th>Data Criação</th>
                <th>Data Modificação</th>
                <th>ações</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            
                $query = mysqli_query($conexao, "SELECT * FROM situacao ORDER BY id");

                while($lista = mysqli_fetch_array($query)){
            ?>
            <tr >
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
                        echo $lista['criada'];
                    ?>
                </td>
                <td>
                    <?php 
                        echo $lista['modificada'];
                    ?>
                </td>
                <td>
                    <div class="row form-inline" >
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=11&id=<?php echo $lista['id'] ?>"  class="btn btn-warning shadow" style="margin: 2px;">Editar</a>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/situacao/del_situacao.php?id=<?php echo $lista['id'] ?>"  class="btn btn-danger shadow" style="margin: 2px;">Excluir</a>
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
</div>