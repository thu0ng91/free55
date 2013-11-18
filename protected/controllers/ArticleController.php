<?php
/**
 * Class ArticleController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class ArticleController extends FWFrontController
{
    /**
     * 小说章节详情
     */
    public function actionView($id)
    {
        $chapter = Article::model()->findByPk($id);
        if (!$chapter) {
            return new CHttpException(404);
        }

        $this->pageTitle = $chapter->title;

        $prevChapter = Article::model()->find(
            'bookid=:bookid and chapter<:chapter order by chapter desc',
            array(
                ':bookid' => $chapter->bookid,
                ':chapter' => $chapter->chapter,
            )
        );

        $nextChapter = Article::model()->find(
            'bookid=:bookid and chapter>:chapter order by chapter asc',
            array(
                ':bookid' => $chapter->bookid,
                ':chapter' => $chapter->chapter,
            )
        );

        // 更新小说统计信息
        $chapter->book->updateStats();

        $this->render('detail', array(
            'chapter' => $chapter,
            'prevChapter' => $prevChapter,
            'nextChapter' => $nextChapter,
        ));
    }
}