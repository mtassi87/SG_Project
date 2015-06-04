<?php



/**
 * Index Controller shows a simple welcome page.
 *
 * @author luke
 */
class IndexController extends Controller
{

    /**
     *
     * @var String layout to use
     */
    public $layout = '_layout';

    /**
     * Index View just provides a welcome page
     */
    public function actionIndex()
    {
        $this->render('index', array());
    }

    /**
     * Checks if we need to call SetupController or ConfigController.
     */
    public function actionGo()
    {
        if ($this->getModule()->checkDBConnection()) {
            $this->redirect(Yii::app()->createUrl('//installer/setup/init'));
        } else {
            $this->redirect(Yii::app()->createUrl('//installer/setup/prerequisites'));
        }
    }
}
