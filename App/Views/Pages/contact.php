<div class="content contact">
    <h2 class="content__title"><?= $metas->title; ?></h2>
    <h3 class="content__subtitle"><?= $metas->subtitle; ?></h3>
    <form action="#" class="contact__form">
        <input class="contact__form__input" onkeyup="this.setAttribute('value', this.value);" type="text" name="name" id="name">
        <label class="contact__form__label contact__form__label--placeholder" for="name">Prénom Nom *</label>

        <input class="contact__form__input" onkeyup="this.setAttribute('value', this.value);" type="email" name="email" id="email">
        <label class="contact__form__label contact__form__label--placeholder" for="email">Votre email <span class="contact__form__label__ex">(example@fai.fr)</span> *</label>

        <input class="contact__form__input" onkeyup="this.setAttribute('value', this.value);" type="text" name="subject" id="subject">
        <label class="contact__form__label contact__form__label--placeholder" for="subject">Sujet</label>

        <label class="contact__form__label" for="msg">Message *</label>
        <textarea class="contact__form__textarea" name="msg" rows="8" cols="40"></textarea>

        <input class="contact__form__submit" type="submit" value="Envoyer">
    </form>
</div>