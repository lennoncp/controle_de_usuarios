<div class="container marketing">
    <div class="row featurette" mb-1>
         <h2 class="featurette-heading">Contato</h2>
    </div>
    <hr class="featurette-divider">

    <div class="row featurette">
    <div class="col-md-6">
        <form action="./dao/contato_mensagem.php" method="POST">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Seu nome" name="nome">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">E-mail</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right text-light">Enviar</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <h2 class="featurette-heading">Contato por Telefone..</h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
   </div>
    </div>

    <hr class="featurette-divider">
    </div>

</div> <!-- /container -->