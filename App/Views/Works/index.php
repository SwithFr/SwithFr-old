<?php use Core\Helpers\Form;

if($this->Auth->isLogged()): ?>
    <?php $hidden = isset($_SESSION['flash']) ? '' : 'hidden'; ?>
    <?= Form::start("add/work", 'POST', ['enctype' => 'multipart/form-data', 'class' => 'adminForm ' . $hidden, 'id' => 'addWorkForm']); ?>
        <label for="title" class="adminForm__label">Titre</label>
        <input type="text" name="title" id="title" class="adminForm__input" value="<?= isset($_SESSION['posted']->title) ? $_SESSION['posted']->title : ''; ?>"/>

        <label for="img" class="adminForm__label">Image</label>
        <input type="file" name="img" id="img" class="adminForm__input"/>

        <label for="description" class="adminForm__label">Description</label>
        <textarea name="description" id="description" class="adminForm__input" cols="30" rows="10"><?= isset($_SESSION['posted']->description) ? $_SESSION['posted']->description : ''; ?></textarea>
    <?= Form::end("Ajouter", ['class' => 'adminForm__submit']); ?>
<?php endif; ?>
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
                <a href="#" class="work__img__link" title="Voir le projet <?= $work->title; ?> en action"><?= \Core\Helpers\Html::img('works/' . $work->img); ?></a>
            </figure>
            <p class="work__description"><?= $work->description; ?></p>
        </div>
    <?php endforeach; ?>
</div>