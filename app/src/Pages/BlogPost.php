<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\DateField;
use SilverStripe\Versioned\Versioned;
use SilverStripe\AssetAdmin\Forms\UploadField;

class BlogPost extends Page
{
    private static $can_be_root = false;

    private static $db = [
        'Date' => 'Date'
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = [
        'Image'
    ];

    private static $belongs_many_many = [
        'Tags'
    ];


    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Article', DateField::create('Date'));
        $fields->addFieldToTab('Root.Article', $image = UploadField::create('Image'));

        $image
            ->setAllowedFileCategories('image');

        return $fields;
    }

}
