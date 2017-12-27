<!doctype html>
<html lang="en">
<head>
    <title>Новости</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/news.css">
</head>
<body class="main">

<div class="container">
    <div class="news-block main__news-block">
        <div class="news-block__top">
            <h1 class="news-block__head">Новости</h1>
        </div>
        <div class="news-block__body">

            <?foreach ($data['items'] as $item):?>
                <div class="news-item">
                    <div class="news-item__top">
                        <span class="news-item__date"><?=$item['idate']?></span>
                        <a href="<?=$item['linc']?>" class="news-item__head"><?=$item['title']?></a>
                    </div>
                    <div class="news-item__body">
                        <?=$item['announce']?>


                    </div>
                    
                    
                </div>
            <?endforeach;?>

        </div>
        <div class="news-block__bottom">
            <div class="pagination">
                <span class="pagination__head">Страницы:</span>
                <div class="pagination__body">
                    <?for($i=1;$i<=$data['page']['pageCount'];$i++):?>
                        <?if($data['page']['current']==$i):?>
                            <span class="pagination__item pagination__item--active"><?=$i?></span>
                        <?else:?>
                            <a href="/news.php?page=<?=$i?>" class="pagination__item"><?=$i?></a>
                        <?endif;?>
                    <?endfor;?>
                </div>
            </div>


        </div>

    </div>

</div>




<script src="/assets/common.js" ></script>
<script src="/assets/news.js" ></script>
</body>
</html>


