<?php
namespace app\view;


class CView{

    /**
     * @param $data
     */
    public function news($data){
        require_once('app\view\news.php');
    }

    /**
     * @param $data
     */
    public function item($data){
        require_once('app\view\item.php');
    }

}