<?php

class ContactPage extends Page
{
    private static $db = [
        'Name'    => 'Text',
        'Email'   => 'Text',
        'Message' => 'HTMLText'
    ];
}
