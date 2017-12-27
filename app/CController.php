<?php

namespace app;

class CController{

   private $config = [];

    /**
     * CController constructor.
     * @param $config
     */
    public function __construct($config)
   {
       $this->config = $config;
   }

    /**
     *
     */
    public function getNews(){

        $p = 1;

        if(isset($_GET['page'])&&is_numeric($_GET['page'])){
            $p = $_GET['page'];
        }

        $news  = new models\CNews($this->config);
        $view  = new view\CView();

        $data = $news->getNews($p);
        $view->news($data);
    }

    public function getDetailNews(){
        $id = isset($_GET['id'])?$_GET['id']:null;


        $news  = new models\CNews($this->config);
        $view  = new view\CView();

        $data = $news->getDetailNews($id);
        $view->item($data);


    }





}