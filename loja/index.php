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

    if(isset($explode[0]) && $explode[0] == ''){
        include "/contents/home.php";
    }elseif($explode[0] != ''){
        if(isset($explode[0]) && in_array($explode[0], $paginas)){
            include "/contents/".$explode[0].".php";
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