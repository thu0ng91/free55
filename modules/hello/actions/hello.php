<?php

class HelloAction extends FWAction
{

	public function run()
	{
        // 带主题调用
//        $this->render("hello",array(
//            "title" => "Hello World",
//        ));
        // 不带主题调用
        $this->renderPartial("hello",array(
           "title" => "Hello World",
        ));
	}
}