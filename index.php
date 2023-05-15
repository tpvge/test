<?php 
    require_once __DIR__ .'/engine/connect.php';
    require_once __DIR__ .'/engine/article_func.php';
    
    $article_id = get_id($id);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
    
</head>
<body>
    <div class="main">
        <div class="contain">
            <div class="block">
            <?php foreach ($articles as $article ): ?>
                <a class="link--to--article" href="article.php?id=<?= $article['id']?>">
                    <div class="article">
                        <h1><?=$article['title']?></h1>
                        <p style="font-size: 20px;"><?=$article['text_small']?></p>
                        <h3><?=$article['date']?></h3>
                        <h4><?=$article['author']?></h4>
                    </div>
                </a>            
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer> 
        <div class="nav"> 
            <div class="page"> 
                <?php 
                    $queries = []; 
                    parse_str($_SERVER['QUERY_STRING'], $queries); 
                    for ($i = 1; $i <= $str_pag; $i++): 
                        $queries['page'] = $i; 
                        $query_string = http_build_query($queries); 
                        echo "<a href=index.php?{$query_string}> Страница ".$i." </a>"; 
                    endfor; 
                ?> 
            </div> 
        </div> 
    </footer>
</body>
</html>