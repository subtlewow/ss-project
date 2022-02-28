<?php

/**
 * Class AdminLoginPage_Controller.
 *
 * Dummy Controller to prevent loading frontend css and javscript files
 */

namespace Devart\Security;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\Director;
use SilverStripe\View\Requirements;

class DevartLoginPageController extends ContentController
{

    private static $allowed_actions = array(
        'index',
        'login',
        'logout',
        'basicauthlogin',
        'lostpassword',
        'passwordsent',
        'changepassword',
        'LoginForm',
    );

    protected function init()
    {
        parent::init();

        Requirements::css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
        Requirements::css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        Requirements::css(Director::baseURL() . 'dist/css/security-login-styles.css');
    }

    public function ResourceFolder()
    {
        return Director::baseURL() . 'dist';
    }
}
