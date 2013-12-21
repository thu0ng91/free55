<?php
/**
 * 演示安装
 * Class Hello
 */
class HelloModule implements IModule
{
    public function install(CDbConnection $db)
    {
        return true;
    }

    public function uninstall(CDbConnection $db)
    {
        return true;
    }
}