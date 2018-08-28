<?php

    $query = mysqli_query($conexao, "SELECT p.id as id, p.nome as nome, p.descricao_curta as descricao_curta, p.preco as preco, p.categoria_id as categoria_id, c.nome as categoria, p.situacao_id as situacao_id from produtos p, categorias c where p.categoria_id = c.id");

?>
<div class="container-fluid">
    <div class="container-fluid col-md-12 margem-top-bottom">
        <div class="form-inline">
            <h2>Destaque de Produtos</h2>
            <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=8" class="btn btn-primary btn-sm ml-auto shadow" >Novo Produto</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>preço</th>
                <th>Categoria</th>
                <th>Destaque</th>
                <th>Ação</th>
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
                <td style="width: 600px;">
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
                        echo $lista['categoria'];
                    ?>
                </td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm shadow" data-toggle="dropdown">
                            <?php 
                                $select = mysqli_query($conexao, "SELECT dp.produto_id as produto_id, d.id as destaque_id, d.destaque as destaque FROM produto_destaque dp, destaque d WHERE dp.destaque_id = d.id AND dp.produto_id=".$lista['id']);
                                $selected = mysqli_fetch_assoc($select);
                            ?>
                            <?php 
                                if(isset($selected['destaque'])){
                                    echo $selected['destaque'] ;
                                }else{
                                    echo "NN";
                                }
                            
                            
                            ?>
                        </button>
                        <div class="dropdown-menu">
                            <?php 
                                $destaques = mysqli_query($conexao, "SELECT * FROM destaque");
                                while($destaque = mysqli_fetch_assoc($destaques)){
                            ?>
                                <a class="dropdown-item" href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/edit_prod_destaque.php?id=<?php echo $lista['id']."&destaque_id=".$destaque['id']; ?>"><?php echo $destaque['destaque'] ?></a>
                            <?php
                                }
                            ?>
                                
                        </div>
                    </div>

                </td>
                <td>
                    <div class="pull-right" >
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=10&id=<?php echo $lista['id'] ?>"  class="btn btn-primary btn-sm shadow" > <span data-feather="search"></span></a>
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/administracao.php?link=9&id=<?php echo $lista['id'] ?>"  class="btn btn-warning btn-sm shadow" ><span data-feather="edit"></span></a>
                   
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']?>/administracao/dao/produto/del_produto.php?id=<?php echo $lista['id'] ?>"  class="btn btn-danger btn-sm shadow"><span data-feather="trash-2"></a>
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