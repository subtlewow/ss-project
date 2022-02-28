<?php

use SilverStripe\Forms\ListboxField;

class BlogHolder extends Page
{
    private static $allowed_children = [
        BlogPost::class
    ];

    private static $has_many = [
        'Tags' => Tags::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Tags', ListboxField::create('Tagsx', 'Select Tag', Tags::get()->map('ID', 'Title')));

        return $fields;
    }
}
