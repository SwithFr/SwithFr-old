<?php

namespace App\Models;


use Core\Models\Behaviors\Validator;

class Contact extends AppModel
{
    use Validator;

    public $validationRules = [
        "name" => [
            ['ruleName' => 'required', 'message' => 'Nom obligatoire']
        ],
        "email" => [
            ['ruleName' => 'required', 'message' => 'Email obligatoire'],
            ['ruleName' => 'isMail', 'message' => 'Format du mail invalide']
        ],
        "msg" => [
            ['ruleName' => 'required', 'message' => 'Message obligatoire']
        ]
    ];

}