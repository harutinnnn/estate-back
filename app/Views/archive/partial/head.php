<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= isset($meta_title) ? $meta_title : '' ?></title>
    <meta name="description" content="<?= isset($meta_desc) ? $meta_desc : '' ?>">
    <meta name="robots" content="<?= isset($meta_robots) ? $meta_robots : '' ?>">
    <meta name="author" content="<?= isset($meta_author) ? $meta_author : '' ?>">

    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:type" content="restaurant"/>
    <meta property="og:title" content="<?= isset($meta_title) ? $meta_title : '' ?>"/>
    <meta property="og:image" content="<?= isset($ogImage) ? $ogImage : '' ?>"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content="<?= isset($meta_desc) ? $meta_desc : '' ?>"/>
    <meta name="twitter:title" content="<?= isset($meta_title) ? $meta_title : '' ?>"/>
    <meta name="twitter:image" content="<?= isset($ogImage) ? $ogImage : '' ?>"/>


    <?php if (!empty($prev_link)): ?>
        <link rel="prev" href="<?php echo $prev_link; ?>" /><?php echo PHP_EOL; endif; ?>
    <?php if (!empty($next_link)): ?>
        <link rel="next" href="<?php echo $next_link; ?>" /><?php echo PHP_EOL; endif; ?>


    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.svg">


    <link rel="stylesheet"
          href="/assets/css/style.css?<?= is_file(FCPATH . '/assets/css/style.min.css') ? filesize(FCPATH . '/assets/css/style.min.css') : '0' ?>">
    <link rel="stylesheet"
          href="/assets/css/custom.css?<?= is_file(FCPATH . '/assets/css/custom.min.css') ? filesize(FCPATH . '/assets/css/custom.min.css') : '0' ?>">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&family=News+Cycle:wght@400;700&family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&family=Noto+Sans+Armenian:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <style type="text/css">
        *{
            font-family: <?= langFontFamily(isset($_lang)?$_lang:'') ?>;
        }
    </style>

    <script type="text/javascript">
        const lang = '<?= isset($_lang) ? $_lang : 'en' ?>';
    </script>
</head>