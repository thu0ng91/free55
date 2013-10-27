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
        $sourceUrl = iconv("GBK", "UTF-8//IGNORE", $_POST['sourceurl']);

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
            $book->linkurl = $sourceUrl;
            $book->save();
        }
//        Yii::log("novel2 " . $name);

        // 获取该小说的所有章节标题，可对章节进行纠正
        $chapterList = isset($_POST['chapterlist']) && is_array($_POST['chapterlist']) ? $_POST['chapterlist'] : array();
        $baseUrl = $sourceUrl;
        foreach ($chapterList as $k => $v)
        {
//            $v = iconv("GBK", "UTF-8//IGNORE", $v);

            $sourceUrl = $this->getAbsoluteUrl($baseUrl, $v);

            $chapter = Article::model()->find('bookid=:bookid and linkurl=:linkurl', array(
                ':bookid' => $book->id,
                ':linkurl' => $sourceUrl,
            ));
            if (!$chapter)
            {
                $chapter = new Article();
                $chapter->title = '敬请期待';
                $chapter->bookid = $book->id;
                $chapter->chapter = $k + 1;
                $chapter->linkurl = $sourceUrl;
                $chapter->save();
            } else {
                // 章节纠正
                if ($chapter->chapter != ($k + 1))
                {
                    $chapter->chapter = $k + 1;
                    $chapter->save();
                }
            }
        }
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
        $catName = iconv("GBK", "UTF-8//IGNORE", $_POST['category']);
        $sourceUrl = iconv("GBK", "UTF-8//IGNORE", $_POST['sourceurl']);

        $category = Category::model()->find('title=:title', array(
            ':title' => $catName,
        ));

        if (!$category) {
            $this->outputAndEnd(-1);
        }

        $book = Book::model()->find('title=:title and cid=:cid', array(
            ':title' => $name,
            ':cid' => $category->id,
        ));

        if (!$book) {
            $this->outputAndEnd(-1);
        }

        $chapter = Article::model()->find('bookid=:bookid and linkurl=:linkurl', array(
            ':bookid' => $book->id,
            ':linkurl' => $sourceUrl,
        ));

        if (!$chapter) {
            $chapter = new Article();
            $chapter->title = $title;
            $chapter->bookid = $book->id;
            $chapter->content = $content;
            $chapter->linkurl = $sourceUrl;
            $chapter->save();
            // 更新章节信息
//            $book->updateLastChapter($chapter);
        } else {
            if ($chapter->title != $title) {
                $chapter->title = $title;
            }
            $chapter->content = $content;
            $chapter->save();
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

    /**
     * 根据base url 获取 url 地址
     * @param $baseUrl
     * @param $url
     * @return string
     */
    private function getAbsoluteUrl($baseUrl, $url)
    {
        if (preg_match('/^http:\/\//', $url) > 0) return $url;

        $list = parse_url($baseUrl);
        $port = isset($list['port']) ? ':' . $list['port'] : '';
        if (preg_match('/^\//', $url) > 0) {
            return "http://" . $list['host']  . $port . $url;
        }

        $p = dirname($list['path']);

        return "http://" . $list['host']  . $port . $p . '/' .  $url;
    }
}