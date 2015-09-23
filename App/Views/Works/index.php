<?php use Core\Helpers\Form;

if($this->Auth->isLogged()): ?>
    <?php $hidden = isset($_SESSION['flash']) ? '' : 'hidden'; ?>
    <?= Form::start("add/work", 'POST', ['enctype' => 'multipart/form-data', 'class' => 'adminForm ' . $hidden, 'id' => 'addWorkForm']); ?>
        <label for="title" class="adminForm__label">Titre</label>
        <input type="text" name="title" id="title" class="adminForm__input" value="<?= isset($_SESSION['posted']->title) ? $_SESSION['posted']->title : ''; ?>"/>

        <label for="img" class="adminForm__label">Image</label>
        <input type="file" name="img" id="img" class="adminForm__input"/>

        <label for="url" class="adminForm__label">URL</label>
        <input type="text" name="url" id="url" class="adminForm__input" value="<?= isset($_SESSION['posted']->url) ? $_SESSION['posted']->url : ''; ?>"/>

        <label for="description" class="adminForm__label">Description</label>
        <textarea name="description" id="description" class="adminForm__input" cols="30" rows="10"><?= isset($_SESSION['posted']->description) ? $_SESSION['posted']->description : ''; ?></textarea>

        <button id="closeAdminForm">Close</button>
    <?= Form::end("Ajouter", ['class' => 'adminForm__submit']); ?>
<?php endif; ?>
<section class="content works">
    <h2 class="content__title"><?= $metas->title; ?></h2>
    <span class="content__subtitle"><?= $metas->subtitle; ?></span>
    <?php foreach($works as $work): ?>
        <section itemscope itemtype="http://schema.org/WebSite" class="work" id="<?= $work->slug; ?>">
            <meta itemprop="creator" content="Jeremy Smith" itemscope itemtype="http://schema.org/Person"/>
            <?php if($this->Auth->isLogged()): ?>
                <span class="adminToolBar">
                    <a href="#" class="adminToolBar__link adminToolBar__link--save">Save</a>
                    <a href="#" class="adminToolBar__link adminToolBar__link--abort">Abort</a>
                    <a class="adminToolBar__link adminToolBar__link--edit" href="#<?= $work->slug; ?>">Edit</a>
                    <a class="adminToolBar__link adminToolBar__link--delete" href="#<?= $work->slug; ?>">X</a>
                </span>
            <?php endif; ?>
            <h2 itemprop='name' class="work__title"><?= $work->title; ?></h2>
            <div class="work__img">
                <a itemprop="url" href="<?= \Core\Helpers\Html::url($work->url, true); ?>" class="work__img__link" title="Voir le projet <?= $work->title; ?> en action"><?= \Core\Helpers\Html::img('works/' . $work->img, "Aperçu du projet " . $work->title, ['itemprop' => 'image']); ?></a>
            </div>
            <p itemprop="description" class="work__description"><?= $work->description; ?></p>
        </section>
    <?php endforeach; ?>
</section>