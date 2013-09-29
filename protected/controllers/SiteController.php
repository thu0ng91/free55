<?php
/**
 * Class SiteController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class SiteController extends Controller
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

        $m = Book::model();
        $s = BookViewStatsByDay::model();
        $w = BookViewStatsByWeek::model();
        $mn = BookViewStatsByMonth::model();
		$this->render('index', array(
            'recommendDataProvider'=>  $m->getRecommendDataProvider(1),
            'newestDataProvider' => $m->getNewestDataProvider(),
            'lastUpdateDataProvider' => $m->getLastUpdateDataProvider(0, 100),
            'dayDataProvider' => $s->getTopHitsDataProvider(date('Y-m-d'),0, 4),
            'weekDataProvider' => $w->getTopHitsDataProvider(date('W'), 0, 4),
            'monthDataProvider' => $mn->getTopHitsDataProvider(date('Y-m'), 0, 4),
        ));
	}
	
//	public function actionImportExcel()
//	{
//		$dir = Yii::getPathOfAlias("application") . "/data";
//		$p = $dir . "/" . "t.xlsx";
//
//		$sheet_array = Yii::app()->yexcel->readActiveSheet($p);
//
//		header("content-type:text/html;charset=utf-8");
//
////		var_dump($sheet_array);
//		echo "<table>";
//
//		foreach( $sheet_array as $row ) {
//			echo "<tr>";
//			if (!$row['A']) continue;
//			foreach( $row as $column )
//				//$column = iconv("gb2312", "utf8", $column);
//				echo "<td>" . $column . "</td>";
//			echo "</tr>";
//		}
//
//		echo "</table>";
//
//		Yii::app()->end();
//	}
}