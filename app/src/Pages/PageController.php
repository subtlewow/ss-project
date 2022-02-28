<?php

use SilverStripe\View\ArrayData;
use SilverStripe\Security\Member;
use SilverStripe\Control\Director;
use SilverStripe\Security\Security;
use SilverStripe\View\Requirements;
use SilverStripe\Control\Controller;
use SilverStripe\CMS\Controllers\ContentController;

class PageController extends ContentController
{
    private $cache_busting = '0.0.3';

    protected function init()
    {
        parent::init();

        if (Director::isDev()) {
            $this->cache_busting = time();
        }
        Requirements::css($this->ResourceFolder() . '/css/application.css?v=' . $this->cache_busting);

        $controller = get_class(Controller::curr());
        if ($controller == 'SilverStripe\Security\Security') {
            Requirements::css($this->ResourceFolder() . '/css/tailwind.css?v=' . $this->cache_busting);
            return;
        }

        Requirements::javascript($this->JsFilePath('fontawesome/all'));
        Requirements::javascript($this->JsFilePath('vendor'));
        Requirements::javascript($this->JsFilePath('application'));
        if ($viewmodel = $this->JsViewModel()) {
            Requirements::javascript($this->JsFilePath($viewmodel));
        }
    }

    public function IsLive()
    {
        return Director::isLive();
    }

    public function isDevJSON()
    {
        return (Director::isLive()) ? 'false' : 'true';
    }

    public function GetUserJSON()
    {
        if ($member = Security::getCurrentUser()) {
            return json_encode($member);
        }

        return "false";
    }

    public function GetPageJSON()
    {
        $page = $this->toMap();
        return json_encode($page);
    }

    //placeholder - to be overwritten
    public function PageDataJSON()
    {
        return "{'test':'hello'}";
    }

    public function JsFilePath($jsfile)
    {
        $local_js_folder = $this->ResourceFolder() . '/js/';
        return $local_js_folder . $jsfile . '.js?v=' . $this->cache_busting;
    }

    public function ResourceFolder()
    {
        return Director::baseURL() . 'dist';
    }

    public function JsViewModel()
    {
        if (!file_exists('dist/js/templates/' . $this->ClassName . '.js')) {
            return false;
        }
        return "templates/" . $this->ClassName;
    }
}
