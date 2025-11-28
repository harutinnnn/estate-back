<div id="wrapper" class="news-page">

    <h1><?= isset($menuObj->title) ? $menuObj->title : '' ?></h1>

    <?php if (isset($news) && !empty($news)): ?>

        <ul>
            <?php foreach ($news as $newsItem): ?>
                <li>
                    <a href="/<?= $_lang ?>/news/<?= $newsItem->id ?>">
                        <h2><?= $newsItem->title ?></h2>
                    </a>
                    <div>

                        <img src="/uploads/news/<?= $newsItem->img ?>" alt="" style="width: 100%">
                        <?= $newsItem->content ?>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>