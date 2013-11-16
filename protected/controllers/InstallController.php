<?php
/**
 * Class InstallController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class InstallController extends FWFrontController
{
    public $layout = 'setup';

    protected $lockFile = 'install.lock';
    protected $dbFile = 'db.sql';

    public function actionIndex()
    {
        $this->redirect('setup');
    }

    /**
     * 安装
     */
    public function actionSetup()
    {

        if ($this->checkIsInstall()) {
            Yii::app()->user->setFlash('actionInfo','已经成功安装了小说系统，不需要重新安装！');
            $this->redirect(array('install/finish'));
        }

        $model = new SetupForm();

        if(isset($_POST['SetupForm']))
        {
            $model->attributes = $_POST['SetupForm'];

            if($model->validate()){

                // 数据配置校验
                $dsn = 'mysql:host='. $model->dbhost . ';dbname=' . $model->dbname;

                $db = new CDbConnection($dsn, $model->username, $model->password);

                try {
                    $db->setActive(true);
                } catch (Exception $e) {
                    Yii::app()->user->setFlash('actionInfo','安装错误！数据库连接失败！请重新填写！');
                    $this->refresh();
                }


                if (false === $this->writeDbConfig($dsn, $model->username, $model->password)) {
                    Yii::app()->user->setFlash('actionInfo','安装错误！数据库配置写入失败！请给 runtime 目录777权限！');
                    $this->refresh();
                }

                // 导入数据库文件
                if (!$this->importDbFile($db)) {
                    Yii::app()->user->setFlash('actionInfo','安装错误！创建数据表失败！请联系作者！');
                    $this->refresh();
                }

                $db->setActive(false);

                $this->createLockFile();

                Yii::app()->user->setFlash('actionInfo','恭喜，安装成功！');
                $this->redirect(array('install/finish'));

            } else {
                $msg = "";
                foreach ($model->getErrors() as $err) {
                    $msg .= array_shift($err) . "<br />";
                }
                Yii::app()->user->setFlash('actionInfo', $msg);
                $this->refresh();
            }
        }
        //$this->render('login',array('model'=>$model));
        $this->render('setup',array('model'=>$model));
    }

    /**
     * 安装完成提示
     */
    public function actionFinish()
    {
        $this->render('finish');
    }

    /**
     * @param $dsn
     * @param $username
     * @param $password
     * @return int|boolean
     */
    protected function writeDbConfig($dsn, $username, $password)
    {
        $dbConfigFile = dirname(dirname(dirname(__FILE__))) . '/runtime/front/db.config.php';

        $dbConfig = @include $dbConfigFile;

        $dbConfig['connectionString'] = $dsn;
        $dbConfig['username'] = $username;
        $dbConfig['password'] = $password;

        $s = "<?php \n return ";
        $s .= var_export($dbConfig, true);
        $s .= ";\n?>";



        return file_put_contents($dbConfigFile, $s, LOCK_EX);
    }

    /**
     * 检查是否已经安装过
     * @return bool
     */
    protected function checkIsInstall()
    {
        $lockFile = Yii::app()->runtimePath . "/" . $this->lockFile;

        return file_exists($lockFile);
    }

    /**
     * 创建安装锁定文件
     */
    protected function createLockFile()
    {
        $lockFile = Yii::app()->runtimePath . "/" . $this->lockFile;
        file_put_contents($lockFile, 'install', LOCK_EX);
    }

    /**
     * 导入数据库文件
     * @param $db CDbConnection
     * @return bool
     */
    protected function importDbFile($db)
    {
        $dbFile =  Yii::app()->runtimePath . "/" . $this->dbFile;

        try {
            $sqlText = file_get_contents($dbFile);

            $sqlList = explode(";", $sqlText);

            foreach ($sqlList as $sql) {
                $sql = trim($sql);
                if ($sql != "")
                    $db->createCommand($sql)->execute();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage(); exit;
            return false;
        }

        return true;
    }
}