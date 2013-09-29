<?php
/**
 * Class ArticleController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class ArticleController extends Controller
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

        $prevChapter = Article::model()->find(
            'id<:id order by id desc',
            array(
                ':id' => $id
            )
        );

        $nextChapter = Article::model()->find(
            'id>:id order by id asc',
            array(
                ':id' => $id
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