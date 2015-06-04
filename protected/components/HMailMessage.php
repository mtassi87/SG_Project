<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HMailMessage extends YiiMailMessage {

    /**
     * Set the body of this entity, either as a string, or array of view
     * variables if a view is set, or as an instance of
     * {@link Swift_OutputByteStream}.
     *
     * @param mixed the body of the message.  If a $this->view is set and this
     * is a string, this is passed to the view as $body.  If $this->view is set
     * and this is an array, the array values are passed to the view like in the
     * controller render() method
     * @param string content type optional. For html, set to 'html/text'
     * @param string charset optional
     */
    public function setBody($body = '', $contentType = null, $charset = null) {
        if ($this->view !== null) {
            if (!is_array($body))
                $body = array('body' => $body);

            // if Yii::app()->controller doesn't exist create a dummy
            // controller to render the view (needed in the console app)
            if (isset(Yii::app()->controller))
                $controller = Yii::app()->controller;
            else
                $controller = new Controller('YiiMail');

            // File Path to Template
            $viewPath = "";

            // Name of current theme if enabled
            $themeName = "";

            if (Yii::app() instanceof CConsoleApplication) {
                if (Yii::app()->theme && Yii::app()->theme != "") {
                    $themeName = Yii::app()->theme;
                }
            } else {
                // WebApplication
                if (($theme = Yii::app()->getTheme()) !== null) {
                    $themeName = $theme->getName();
                }
            }

            // When ThemeName is speified
            if ($themeName != "") {
                $viewThemed = str_replace('application.views.', 'webroot.themes.' . $themeName . '.views.', $this->view);
                $viewThemed = preg_replace('/application\.modules(?:_core)?\.(.*?)\.views\.(.*)/i', 'webroot.themes.' . $themeName . '.views.\1.\2', $viewThemed);

                if (file_exists(Yii::getPathOfAlias($viewThemed) . ".php")) {
                    $viewPath = Yii::getPathOfAlias($viewThemed) . ".php";
                }
            }

            // Use orginal view name, if not set yet
            if ($viewPath == "") {
                $viewPath = Yii::getPathOfAlias($this->view) . ".php";
            }

            $body = $controller->renderInternal($viewPath, array_merge($body, array('mail' => $this)), true);
        }
        return $this->message->setBody($body, $contentType, $charset);
    }

}

?>
