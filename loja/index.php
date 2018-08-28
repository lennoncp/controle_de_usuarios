<?php 
    session_start();
    //define('pg', 'http://127.0.0.2/loja');
    define('pg', 'http://'.$_SERVER['SERVER_NAME'].'/loja');

    include_once "dao/conexao.php";
    
?>
<html lang="pt-br">
<head>
    <title>Page Title</title>
<?php 
    include "/includes/head.php";
?> 
</head>
<body>
<?php 
    include "/includes/navbar.php";

    $url = (isset($_GET['url'])) ? $_GET['url']:'';
    $explode = explode('/', $url);

    $paginas = array('home', 'produto', 'empresa', 'contato');

    $produtos = mysqli_query($conexao, "SELECT slug FROM produtos ORDER BY id ");
    $produtoSlugs = array();

    if(mysqli_num_rows($produtos) > 0){
        while($row = mysqli_fetch_assoc($produtos)){
            $produtoSlugs[] = $row['slug'];
        }
    }
/*
    //Cria array de permissoes do usuario
    $select_permisoes = mysqli_query($conexao, "SELECT p.id as id FROM usuarios u, usuario_permissoes up, permisao p WHERE u.id = up.usuario_id AND up.permisao_id = p.id AND u.id = ".$dados['id']." ") or die(mysqli_error($conexao));
    $permissoes = array();

    if(mysqli_num_rows($select_permisoes) > 0){
        while($row = mysqli_fetch_assoc($select_permisoes)){
            $permissoes[] = $row['id'];
        }
    }
*/
    if(isset($explode[0]) && $explode[0] == ''){
        include "/contents/home.php";
    }elseif($explode[0] != ''){
        if(isset($explode[0]) && in_array($explode[0], $paginas)){
            //print_r($produtoSlugs);
           // include "/contents/".$explode[0].".php";

            if(isset($explode[2]) && in_array($explode[2], $produtoSlugs)){
                include "/contents/detalha_produto.php";
            }else{
                include "/contents/".$explode[0].".php"; 
                
            }

        }else{
            include "/contents/home.php";
        }
    }

/*
    if(isset($_GET['link'])){

        $link  = $_GET['link'];

        $page[1] = "./contents/index.php";
        $page[2] = "./contents/produtos.php";

        if(file_exists($page[$link])){
            include $page[$link];
        }else{
            include $page[1];
        }
    }else{

        include "./contents/index.php";
    }
*/
    include "/includes/footer.php";
?> 
</body>
</html>