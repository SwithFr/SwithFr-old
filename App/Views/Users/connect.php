<?php use Core\Helpers\Form; ?>

<?= Form::start("connect"); ?>
<?= Form::input("text", "login", _("Login"), null, null, _("login")); ?>
<?= Form::input("password", "password", _("Password"), null, null, _("password")); ?>
<?= Form::end(_("Se connecter")); ?>