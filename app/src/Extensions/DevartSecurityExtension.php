<?php

namespace Devart\DevartSecurityTemplates;

use SilverStripe\Core\Config\Config;
use SilverStripe\View\ArrayData;
use SilverStripe\View\TemplateGlobalProvider;

class DevartSecurityExtension implements TemplateGlobalProvider
{

    public static function GetDSConfigVars()
    {
        $configVars = new ArrayData(array(
            'SecurityMainTitle'               => Config::inst()->get('DevartSecurityExtension', 'SecurityMainTitle'),
            'SecurityLoginCardTitle'          => Config::inst()->get('DevartSecurityExtension', 'SecurityLoginCardTitle'),
            'SecurityLostPasswordCardTitle'   => Config::inst()->get('DevartSecurityExtension', 'SecurityLostPasswordCardTitle'),
            'SecurityPasswordSentCardTitle'   => Config::inst()->get('DevartSecurityExtension', 'SecurityPasswordSentCardTitle'),
            'SecurityChangePasswordCardTitle' => Config::inst()->get('DevartSecurityExtension', 'SecurityChangePasswordCardTitle'),
        ));
        return $configVars;
    }

    public static function get_template_global_variables()
    {
        return array(
            'DSConfigVars' => 'GetDSConfigVars', //prefix with DS (devart security) for the sake of scope
        );
    }
}
