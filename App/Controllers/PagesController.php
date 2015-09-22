<?php

namespace App\Controllers;


class PagesController extends AppController
{

    public function index()
    {
        $this->layout = "home";
        $d['metas'] = $this->Page->getFirst([
           "where" => ['ref' => 'home']
        ]);

        return $this->set($d);
    }

    public function contact()
    {
        $this->layout = "default";
        $d['metas'] = $this->Page->getFirst([
            "where" => ['ref' => 'contact']
        ]);

        return $this->set($d);
    }

    public function about()
    {
        $this->layout = "default";
        $d['metas'] = $this->Page->getFirst([
            "where" => ['ref' => 'about']
        ]);

        return $this->set($d);
    }

}
