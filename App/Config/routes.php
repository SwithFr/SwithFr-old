<?php

use Core\Router;

/**--------------------------
 * PUBLIC
--------------------------*/

# Homepage
Router::join('home', [
    "controller" => 'pages',
    "action"     => 'index'
]);

# Contact page
Router::join('contact-me', [
    "controller" => 'pages',
    "action"     => 'contact'
]);

# About page
Router::join('about', [
    "controller" => 'pages',
    "action"     => 'about'
]);

# Works page
Router::join('works', [
    "controller" => 'works',
    "action"     => 'index'
]);

# Log in
Router::join('connect', [
    "controller" => 'users',
    "action"     => 'connect'
]);

# Logout
Router::join('logout', [
    "controller" => 'users',
    "action"     => 'logout'
]);


/**--------------------------
 * ADMIN
 --------------------------*/

# Edit a work
Router::join('edit/work/{slug}', [
    "controller" => 'works',
    "action"     => 'edit',
    "prefixe"    => 'admin',
    "params"     => [
        "slug"  => '/[a-zA-Z\-]/'
    ]
]);

# Delete a work
Router::join('delete/work/{slug}', [
    "controller" => 'works',
    "action"     => 'delete',
    "prefixe"    => 'admin',
    "params"     => [
        "slug"  => '/[a-zA-Z\-]/'
    ]
]);

# Add a work
Router::join('add/work', [
    "controller" => 'works',
    "action"     => 'add',
    "prefixe"    => 'admin',
]);

# Récupère un work
Router::join('get/work/{slug}', [
    "controller" => 'works',
    "action"     => 'getDescription',
    "prefixe"    => 'admin',
    "params"     => [
        "slug"  => '/[a-zA-Z\-]/'
    ]
]);