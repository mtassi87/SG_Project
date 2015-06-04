<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class SiteController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {

        $this->redirect(array('dashboard/dashboard'));
    }

}
