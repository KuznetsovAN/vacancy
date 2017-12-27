<!doctype html>
<html lang="en">
<head>
    <title><?=$data['title']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/news.css">
</head>
<body class="main">

<div class="container">
    <div class="news-block main__news-block">
        <div class="news-block__top">
            <h1 class="news-block__head"><?=$data['title']?></h1>
        </div>
        <div class="news-block__body">
            <div class="news-block__text">
                <?=$data['content']?>
            </div>
        </div>
        <div class="news-block__bottom">

            <a href="/news.php" class="news-block__all-news">Все новости >></a>

        </div>

    </div>

</div>




<script src="/assets/common.js" ></script>
<script src="/assets/news.js" ></script>
</body>
</html>

