<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class TourModule extends HWebModule
{

    public $isCoreModule = true;

    public static function onDashboardSidebarInit($event)
    {
        if (Yii::app()->user->isGuest)
            return;

        if (HSetting::Get('enable', 'tour') == 1 && Yii::app()->user->getModel()->getSetting("hideTourPanel", "tour") != 1) {
            $event->sender->addWidget('application.modules_core.tour.widgets.TourDashboardWidget', array(), array('sortOrder' => 0));
        }
    }

}
