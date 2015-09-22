<div class="content works">
    <h2 class="content__title"><?= $metas->title; ?></h2>
    <h3 class="content__subtitle"><?= $metas->subtitle; ?></h3>
    <?php foreach($works as $work): ?>
        <div class="work" id="<?= $work->slug; ?>">
            <?php if($this->Auth->isLogged()): ?>
                <span class="adminToolBar">
                    <a href="#" class="adminToolBar__link adminToolBar__link--save">Save</a>
                    <a href="#" class="adminToolBar__link adminToolBar__link--abort">Abort</a>
                    <a class="adminToolBar__link adminToolBar__link--edit" href="#<?= $work->slug; ?>">Edit</a>
                    <a class="adminToolBar__link adminToolBar__link--delete" href="#<?= $work->slug; ?>">X</a>
                </span>
            <?php endif; ?>
            <h2 class="work__title"><?= $work->title; ?></h2>
            <figure class="work__img">
                <a href="#" class="work__img__link" title="Voir le projet BookStore en action"><?= \Core\Helpers\Html::img('works/bookstore.png'); ?></a>
            </figure>
            <p class="work__description"><?= $work->description; ?></p>
        </div>
    <?php endforeach; ?>
</div>