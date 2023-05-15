<?php 
    require_once __DIR__ .'/connect.php';
    


    $id = 1;
    if (isset($_GET['id'])){
        $id = intval($_GET['id']); 
    }

    $article_id = get_id($id);
    function get_id($id): array{ 
      global $pdo;

      $res = $pdo -> query("SELECT  id, title, date, text_small , author, text_big FROM articles_table
     where
        id = $id");
        return $res -> fetch();}
  


    if (isset($_GET['page'])){ 
        $page = $_GET['page'];
    }else {
        $page = 1;
    }


    $kol = 5;  
    $art = ($page * $kol) - $kol;
    $articles = get_article($art, $kol);
    $res = get_count();
    $total = $res[0]['count(*)']; 
    $str_pag = ceil($total / $kol);
    
    function get_count(): array 
{
    global $pdo;
    $res = $pdo -> query("SELECT count(*) FROM articles_table 
     ");
     return $res -> fetchAll();
}
        
function get_article($kol, $art): array{ 
    global $pdo;
    $res = $pdo -> query("SELECT id, title, date, text_small , author  FROM articles_table ORDER BY date DESC  limit $kol, $art");
    return $res -> fetchAll();
}
       

?>