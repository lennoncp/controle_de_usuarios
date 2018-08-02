<?php
    $id = $_GET['id'];
    $query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id='$id' ");
    $resultado = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <div class="container col-md-6" style="padding: 10px;">
        <h2>Visualização de Usuário</h2>
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" class="form-control" id="nome"  name="id" value="<?php echo $resultado['id'] ?>">
            <input type="text" class="form-control" id="nome" placeholder="Entre com o Nome" name="nome" value="<?php echo $resultado['nome'] ?>" disabled>
            </div>
            <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" class="form-control" id="usuario" placeholder="Entre com o seu Usuário" name="usuario" value="<?php echo $resultado['usuario'] ?>" disabled>
            </div>
            <div class="form-group">
            <label for="criado">Criado:</label>
            <input type="text" class="form-control" id="criado"  name="criado" value="<?php echo $resultado['criado'] ?>" disabled>
            </div>
            <div class="form-group">
            <label for="modificado">Modificado:</label>
            <input type="text" class="form-control" id="modificado"  name="modificado" value="<?php echo $resultado['modificado'] ?>" disabled>
            </div>
            <div class="form-group">
            <label for="sel1">Nível de Acesso</label>
            <select class="form-control" id="nivel" name="nivel" disabled>
                <option value="1" 
                    <?php 
                        if($resultado['nivel_acesso_id'] == 1){
                            echo "selected";
                        }
                    ?>
                >Administrador</option>
                
                <option value="2" 
                    <?php 
                        if($resultado['nivel_acesso_id'] == 2){
                            echo "selected";
                        }
                    ?>
                >Usuário</option>
            </select>
            </div>
            <div class="form-group">
            <label for="sel1">Status</label>
            <select class="form-control" id="nivel" name="status" disabled>
                <option value="1"
                    <?php 
                        if($resultado['status'] == 1){
                            echo "selected";
                        }
                    ?>
                >Ativo</option>
                <option value="0"
                    <?php 
                        if($resultado['status'] == 0){
                            echo "selected";
                        }
                    ?>
                >Desativo</option>
            </select>
            </div>
    </div>
</div>