<?php
/**
 * Class ArticleController
 *
 * Web Post 发布接口
 * @author pizigou <pizigou@yeah.net>
 */
class PublishController extends Controller
{
    protected function beforeAction($action)
    {
        $this->requestIsValid();
        return true;
    }
    /**
     * 小说发布
     */
    public function actionNovel()
    {

        $name = iconv("GBK", "UTF-8//IGNORE",  $_POST['name']);
        $author = iconv("GBK", "UTF-8//IGNORE", $_POST['author']);
        $catName = iconv("GBK", "UTF-8//IGNORE", $_POST['category']);
        $intro = iconv("GBK", "UTF-8//IGNORE", $_POST['intro']);
        $imgUrl = iconv("GBK", "UTF-8//IGNORE", $_POST['imgurl']);

        Yii::log("novel1 " . $name);

        $category = Category::model()->find('title=:title', array(
            ':title' => $catName,
        ));

        if (!$category) {
            $category = new Category();

            $category->title = $catName;
            $category->shorttitle = H::getPinYin($catName);
            $category->parentid = 0;
            $category->isnav = 1;
            $category->save();
        }

        $book = Book::model()->find('title=:title and cid=:cid', array(
            ':title' => $name,
            ':cid' => $category->id,
        ));

        if (!$book) {
            $book = new Book();
            $book->title = $name;
            $book->cid = $category->id;
            $book->author = $author;
            $book->summary = $intro;
            $book->imgurl = $imgUrl;
            $book->save();
        }
        Yii::log("novel2 " . $name);

        $this->outputAndEnd(0);
    }

    /**
     * 章节发布
     */
    public function actionChapter()
    {
        $title = iconv("GBK", "UTF-8//IGNORE", $_POST['title']);
        $content = iconv("GBK", "UTF-8//IGNORE", $_POST['content']);
        $name = iconv("GBK", "UTF-8//IGNORE", $_POST['name']);

        $book = Book::model()->find('title=:title', array(
            ':title' => $name,
        ));

        if (!$book) {
            $this->outputAndEnd(-1);
        }

        $chapter = Article::model()->find('title=:title', array(
            ':title' => $title,
        ));

        if (!$chapter) {
            $chapter = new Article();
            $chapter->title = $title;
            $chapter->bookid = $book->id;
            $chapter->content = $content;
            $chapter->save();
            // 更新章节信息
//            $book->updateLastChapter($chapter);
        }

        $this->outputAndEnd(0);
    }

    /**
     * 检查采集请求是否合法
     */
    private function requestIsValid()
    {
        $authKey = $_POST['auth_key'];
        if ($authKey != Yii::app()->params['gather_auth_key'])
        {
            $this->outputAndEnd(-1);
        }
    }

    /**
     * 输出并停止
     * @param $r
     */
    private function outputAndEnd($r = 0)
    {
        echo $r;
        Yii::app()->end();
    }
}