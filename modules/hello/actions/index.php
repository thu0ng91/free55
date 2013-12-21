<?php

class IndexAction extends FWAction
{

	public function run()
	{
        // 带主题调用
//        $this->render("hello",array(
//            "title" => "Hello World",
//        ));

//        print_r($this->db);exit;
        $m = Table::model("book");
        $r = $m->findByPk(1);

//        $r->title = $r->title . "1";
//        $r->save();
//        print_r($r->id);
//        print_r($r);exit;
        // 不带主题调用
        $this->renderPartial("hello",array(
           "title" => $r->author,
        ));
	}
}