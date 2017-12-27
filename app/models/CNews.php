<?php
namespace  app\models;


class CNews extends CModel {

    public $tableName = 'news';
    public $order = 'idate';

    /**
     * @param $p
     * @return mixed
     */
    public function getNews($p){


        $res['items'] = $this->getAll($p);

        $res['page']['current'] =  $p;
        $res['page']['count'] = $this->getCount();
        $res['page']['pageCount'] = ceil($res['page']['count']/$this->limit);


        foreach ($res['items'] as &$item){
            $item['idate'] = date("d.m.Y",$item['idate']);
            $item['linc'] = "view.php?id=". $item['id'];

        }

        return $res;


    }

    /**
     * @param $id
     * @return array
     */
    public function getDetailNews($id){
        $elm  = $this->getOne($id);
        $elm['idate'] = date("d.m.Y",$elm['idate']);

        return $elm;
    }

}