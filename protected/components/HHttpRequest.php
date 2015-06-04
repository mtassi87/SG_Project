<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
class HHttpRequest extends CHttpRequest {

    public $csrfTokenName = 'CSRF_TOKEN';

    /**
     * Returns whether this is an AJAX (XMLHttpRequest) request.
     * @return boolean whether this is an AJAX (XMLHttpRequest) request.
     */
    public function getIsAjaxRequest() {

        if (!parent::getIsAjaxRequest()) {
            if (isset($_REQUEST['ajax'])) {
                return true;
            }
            return false;
        }
        return true;
    }

    public function getPreferredAvailableLanguage()
    {
       
        $preferedLanguages = $this->getPreferredLanguages();
        $languages = array_keys(Yii::app()->params['availableLanguages']);
        
        foreach ($preferedLanguages as $preferredLanguage) {       
            foreach ($languages as $language) {
                $preferredLanguage = CLocale::getCanonicalID($preferredLanguage);
                if ($language === $preferredLanguage) {
                    return $language;
                }
            }  
        }
        return false;
    }
}

?>
