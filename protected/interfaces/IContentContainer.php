<?php

/**
 * Social Gaming
 * Copyright © 2015 Social Gaming
 */
interface IContentContainer
{

    public function getProfileImage();

    public function getUrl();

    /**
     * Returns the display name of the container
     * 
     * @since 0.11.0
     */
    public function getDisplayName();

    /**
     * Indiciates the given or current user can access private content
     * of this container.
     * 
     * @since 0.11.0
     * @param User $u
     * @return boolean
     */
    public function canAccessPrivateContent(User $u = null);
}
