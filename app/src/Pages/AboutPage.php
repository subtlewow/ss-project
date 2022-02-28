<?php

use SilverStripe\Assets\Image;
use SilverStripe\Versioned\Versioned;
use SilverStripe\AssetAdmin\Forms\UploadField;

class AboutPage extends Page
{
    private static $has_one = [
        'Photo' => Image::class
    ];

    private static $owns = [
        'Photo'
    ];

    private static $extensions = [
        Versioned::class
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', $photo = UploadField::create('Photo')->setDescription('Only photos allowed.'), 'Content');

        $photo
            ->setAllowedFileCategories('image');

        return $fields;
    }


}
