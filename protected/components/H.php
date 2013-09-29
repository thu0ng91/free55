<?php
/**
 * Created by JetBrains PhpStorm.
 * User: think
 * Date: 13-9-27
 * Time: 下午11:13
 * To change this template use File | Settings | File Templates.
 */
Yii::import('ext.chinese.JChinese');

class H {

    /**
     * 获取字符串对应的拼音
     * @param $str
     * @param $isTrimBank 是否去除拼音之间的空格
     * @return string
     */
    public static function getPinYin($str, $isTrimBank = true)
    {


        $c = new JChinese('GB2312', 'PinYin');

        $str = iconv('UTF-8', 'GB2312//IGNORE', $str);
//        echo $str;exit;
//        $c->setSourceText($str);

        $str =  $c->convert($str);

        if ($isTrimBank) {
            $str = str_replace(' ', "", $str);
        }

        return $str;
    }

    /**
     * 裁剪自定长度字符串，去除掉字符串中的HTML和PHP标签
     * @param $str
     * @param $len
     * @param string $suffix
     * @return string
     */
    public static function substr($str, $len, $suffix = "...")
    {
        $str = trim(strip_tags($str));
        $str = str_replace("&nbsp;", "", $str);
        mb_internal_encoding("UTF-8");
        return mb_substr($str, 0, $len) . $suffix;
    }
}