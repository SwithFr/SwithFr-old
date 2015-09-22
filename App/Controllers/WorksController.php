<?php

namespace App\Controllers;


use Core\Helpers\CSRFTool;
use SwithError\SwithError;

class WorksController extends AppController
{

    public function index()
    {
        $this->loadModel("Page");
        $d['metas'] = $this->Page->getFirst([
            "where" => ['ref' => 'works']
        ]);

        $d['works'] = $this->Work->get([
            "where" => ['online' => 1]
        ]);

        return $this->set($d);
    }

    public function admin_add()
    {

    }

    public function admin_delete($slug)
    {
        echo "ok";
        if ($this->Work->exist(['slug' => $slug])) {
            $id = $this->Work->getFirst([
                'fields' => 'id',
                'where' => ['slug' => $slug]
            ])->id;
            $this->Work->delete($id);
        }
    }

    public function admin_edit($slug)
    {
        if ($this->Request->isPost && $this->Work->exist(['slug' => $slug])) {
            $this->Work->update($slug, $_REQUEST);
        } else {
            (new SwithError([
                "title" => "Unknown error occured",
                "message" => "Request lost in the void..."
            ]))->display(false);
        }
    }
}
