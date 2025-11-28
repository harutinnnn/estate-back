<?php

use App\Libraries\LangUtils;

?>
<h1 class="page-title">
    <?= translate('home_page') ?>
</h1>

<section class="content">
    <?= LangUtils::getLabelContent('home_page_content', $_lang); ?>
</section>