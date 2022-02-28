<?php

use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Versioned\Versioned;

class HomePage extends Page
{
    private static $db = [
        'TextContent' => 'HTMLText'
    ];

    private static $has_one = [
        'PhotoContent' => Image::class,
    ];

    private static $owns = [
        'PhotoContent'
    ];

    private static $extensions = [
        Versioned::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.MainContent', HTMLEditorField::create('TextContent'));
        $fields->addFieldToTab('Root.MainContent', $image = UploadField::create('PhotoContent'));

        $image
            ->setAllowedFileCategories('image');

        return $fields;
    }

}
