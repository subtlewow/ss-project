<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldButtonRow;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldToolbarHeader;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Subsites\Model\Subsite;
use Symbiote\GridFieldExtensions\GridFieldAddNewInlineButton;
use Symbiote\GridFieldExtensions\GridFieldEditableColumns;
use Symbiote\GridFieldExtensions\GridFieldTitleHeader;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class SiteConfigExtension extends DataExtension
{

    /**
     * @var array
     */
    private static $db = [
        'HeadCode'             => 'Text',
        'BodyOpenCode'         => 'Text',
        'BodyCloseCode'        => 'Text',
        'MailingListEmailAddress' => 'Text',
    ];

    private static $has_one = [
        'PageLogo' => Image::class
    ];

    private static $owns = [
        'PageLogo'
    ];

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('MailingListEmailAddress'),
            TextareaField::create('HeadCode', '<head> code')->setDescription('i.e. Google Analytics, Facebook Pixel, etc.'),
            TextareaField::create('BodyOpenCode', '<body> open code'),
            TextareaField::create('BodyCloseCode', '<body> close code'),
            $image = UploadField::create('PageLogo')
        ]);

        $image
            ->setAllowedFileCategories('image');

    }

}
