<?php

namespace Devart\DevartSecurityTemplates;

use SilverStripe\Control\Director;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

class DevartSecurityTemplatesExtension extends Extension
{
    public function onBeforeInit()
    {
        // Object::useCustomClass('PageController', 'DevartAdminLoginPageController');
        // Injector::inst()->get('PageController')->class('DevartAdminLoginPageController');
    }

    public function onAfterInit()
    {
        if (!Director::is_ajax()) {
            Requirements::clear();
            Requirements::css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
            Requirements::css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            Requirements::css(Director::baseURL() . 'public/dist/css/security-login-styles.css');
        }
    }

}
