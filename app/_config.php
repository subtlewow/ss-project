<?php

use Monolog\Handler\NativeMailerHandler;
use Psr\Log\LoggerInterface;
use SilverStripe\Control\Director;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\Security\Member;
use SilverStripe\Security\PasswordValidator;

// remove PasswordValidator for SilverStripe 5.0
$validator = new PasswordValidator();

$validator->minLength(8);
$validator->checkHistoricalPasswords(6);
Member::set_password_validator($validator);

if (!Director::isDev()) {
    $mailhandler = new NativeMailerHandler('support@devart.nz', 'Error on site: ' . Director::absoluteBaseURL(), 'noreply@devart.nz', 'warning');
    $mailhandler->setContentType('text/html');
    $mailhandler->setFormatter(new SilverStripe\Logging\DetailedErrorFormatter());

    Injector::inst()->get(LoggerInterface::class)->pushHandler($mailhandler);
}

$formats = [
    ['title' => 'Paragraph', 'block' => 'p'],
    ['title' => 'Heading 1', 'block' => 'h1'],
    ['title' => 'Heading 2', 'block' => 'h2'],
    ['title' => 'Heading 3', 'block' => 'h3'],
];

TinyMCEConfig::get('cms')
    ->setButtonsForLine(2, [
        'styleselect', '|',
        'paste', 'pastetext', '|',
        'table', 'ssmedia', 'ssembed', 'sslink', 'unlink', '|',
        'code',
    ])
    ->setOptions([
        'importcss_append' => true,
        'style_formats'    => $formats,
    ]);

//https://www.tinymce.com/docs/configure/content-formatting/#style_formats

// if (Director::isLive()) {
//     Director::forceWWW();
//     Director::forceSSL(null, 'devart.co.nz');
// }
