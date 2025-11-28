<nav>
    <ul>

        <?php if (isset($mainMenu) && !empty($mainMenu)): ?>
            <?php foreach ($mainMenu as $mainMenuItem): ?>
                <li>
                    <a href="/<?= $_lang ?>/<?= $mainMenuItem->url ?>"
                       class="<?= $currentPage == $mainMenuItem->url ? 'active' : '' ?>">
                        <?= $mainMenuItem->title ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>

        <li class="language">
            <?= $langList[$_lang]; ?>
            <ul class="language-list">
                <?php foreach ($langList as $langKey => $langTitle): ?>
                    <?php if ($langKey != $_lang): ?>
                        <li>
                            <?php if (isset($langPageLinks[$langKey])): ?>
                                <a href="/<?= $langPageLinks[$langKey] ?>"><?= $langTitle ?></a>
                            <?php else: ?>
                                <a href="/<?= $langKey ?>"><?= $langTitle ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>

    </ul>
</nav>