<?php

namespace App\Controllers;


use Core\Helpers\CSRFTool;
use Core\Helpers\Image;
use Core\Helpers\ImageUploader;
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
            "where" => ['online' => 1],
            "order" => "id DESC"
        ]);

        return $this->set($d);
    }

    public function admin_add()
    {
        if ($this->Request->isPost && CSRFTool::check()) {
            $_SESSION['posted'] = $this->Request->data;
            if ($this->Work->validate($this->Request->data)) {
                $name = substr(md5($this->Request->data->title), 0, 10);
                $dest = BASE . DS . 'App' . DS . 'Webroot' . DS . 'img' . DS . 'works' . DS;
                ImageUploader::upload($_FILES['img'], $name, $dest);
                $this->Request->data->img = $name . Image::getExtension($_FILES['img']['name']);
                unset($_SESSION['posted']);
                $this->Work->create($this->Request->data);
                $this->Session->setFlash("Work addes");
            } else {
                $this->Session->setFlash("Error", 'error');
            }
        }

        $this->redirect($this->Request->referer);
    }

    public function admin_delete($slug)
    {
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
