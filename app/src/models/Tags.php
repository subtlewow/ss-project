<?php

use SilverStripe\ORM\DataObject;

class Tags extends DataObject
{
    private static $db = [
        'Tags' => 'Text'
    ];

    private static $has_one = [
        'BlogHolder' => BlogHolder::class,
    ];

    private static $many_many = [
        'BlogPost' => BlogPost::class,
    ];

}
