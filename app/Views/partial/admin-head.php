<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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


    <link rel="icon" href="/assets/img/core-img/favicon.ico">


    <?php if ($_lang =='hy'): ?>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Armenian:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


        <style type="text/css">
            *{
                font-family: "Inter", sans-serif;
            }
        </style>

    <?php else: ?>

        <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,500,600,700&amp;display=swap" rel="stylesheet"
              data-optimized-fonts="true">

        <style type="text/css">
            *{
                font-family: "Nunito";
            }
        </style>

    <?php endif; ?>




    <link data-next-font="" rel="preconnect" href="/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet"
          href="/assets/css/settings.css?<?= is_file(FCPATH . '/assets/css/settings.css') ? filesize(FCPATH . '/assets/css/settings.css') : '0' ?>">
    <link rel="stylesheet"
          href="/assets/css/style.css?<?= is_file(FCPATH . '/assets/css/style.css') ? filesize(FCPATH . '/assets/css/style.css') : '0' ?>">
    <link rel="stylesheet"
          href="/assets/css/admin.css?<?= is_file(FCPATH . '/assets/css/admin.css') ? filesize(FCPATH . '/assets/css/admin.css') : '0' ?>">
    <link rel="stylesheet"
          href="/assets/css/auth.css?<?= is_file(FCPATH . '/assets/css/auth.css') ? filesize(FCPATH . '/assets/css/auth.css') : '0' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">

    <script type="text/javascript">
        const lang = '<?= isset($_lang) ? $_lang : 'en' ?>';
    </script>
</head>