<div class="container-fluid" style="padding: 5px;">

    <div class="container col-md-6" >
        <h1>Entre em Contato com a gente.</h1>
        <form method="POST"  action="http://<?php echo $_SERVER['SERVER_NAME']?>/dao/cad_contato.php">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" placeholder="Titulo da mensagem" name="titulo">
            </div>
            <div class="form-group">
                <label for="end">Endereço</label>
                <input type="text" class="form-control" id="end" placeholder="Endereco" name="end">
            </div>
            <div class="form-group">
                <label for="tel">Telefone</label>
                <input type="text" class="form-control" id="tel" placeholder="Titulo da mensagem" name="tel">
            </div>
            <div class="form-group">
                <label for="msg">Mensagem</label>
                <textarea class="form-control" rows="5" id="msg" name="msg"></textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Enviar</button>
        </form>
    </div>
    
</div>