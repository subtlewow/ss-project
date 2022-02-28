<?php

/**
 * Class AdminLoginPage_Controller.
 *
 * Dummy Controller to prevent loading frontend css and javscript files
 */

namespace Devart\Security;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\View\ArrayData;

class DevartLoginPage extends SiteTree
{

    public function LoginConfigVars()
    {
        $configVars = new ArrayData(array(
            'SecurityMainTitle'               => '',
            'SecurityLoginCardTitle'          => 'Admin Login',
            'SecurityLostPasswordCardTitle'   => 'Password Reset',
            'SecurityPasswordSentCardTitle'   => 'Successful',
            'SecurityChangePasswordCardTitle' => 'Choose New Password',
        ));
        return $configVars;
    }

    public function ClassName()
    {
        return 'SecurityPage';
    }
}
