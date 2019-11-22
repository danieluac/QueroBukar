<?php

namespace app\controller;
use Fonte\Basedados\Capsula\Capsula;
/**
 * Description of index */
class ControllerCurso extends Controller
{
    protected $view;
    public function __construct(){ }

    public function getIndex ()
    {
    }


    public function getCurso()
    {
      header("Content-type: Application/json");
      header("Access-Control-Allow-Origin: *");
      header("Connection: close");
        print $this->setModel("register/curso")->getJson();
    }
}
