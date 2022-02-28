<?php

use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Versioned\Versioned;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class Page extends SiteTree
{
    private static $db = [
        // Header
        'SubText'                     => 'Text',
        'MainHeading'                 => 'Text',
        'SubHeading'                  => 'Text',

        'GoogleAnalyticsTrackingCode' => 'Text',
        'FacebookPageTitle'           => 'Text',
        'FacebookPageSumary'          => 'Text',
        'FacebookPageType'            => 'Text',
    ];

    private static $has_one = [
        'FacebookPageImage'     => Image::class,
    ];

    private static $owns = [
        'FacebookPageImage',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.SEO / Social', LiteralField::create('FBInstructions', '<p style="max-width:840px">The following fields allow you to have some control over how a page will look when shared on facebook or other social media. For facebook in particular you can go to <a target="_blank" href="https://developers.facebook.com/tools/debug/">https://developers.facebook.com/tools/debug/</a> and copy and paste in the link below to see how this page will look when shared.</p>'));
        $fields->addFieldToTab('Root.SEO / Social', ReadonlyField::create('This Page', 'This Page', $this->AbsoluteLink()));
        $fields->addFieldToTab('Root.SEO / Social', TextField::create('FacebookPageTitle')->setDescription('Optional: Allows you to control the title used when sharing this page on facebook.'));
        $fields->addFieldToTab('Root.SEO / Social', TextareaField::create('FacebookPageSumary')->setDescription('Optional: Allows you to control the text that appears when this page is shared in a facebook post or message.'));
        $fields->addFieldToTab('Root.SEO / Social', UploadField::create('FacebookPageImage', 'Facebook share image')->setDescription('Optional: Facebook recommends an image with dimensions at least 1200 x 630 pixels.')->setFolderName('facebook-images')->setAllowedFileCategories('image'));

        $page_types = [
            'website' => 'website',
            'article' => 'article',
            'place'   => 'place',
            'product' => 'product',
            'profile' => 'profile',
        ];

        $fields->addFieldToTab('Root.SEO / Social', DropdownField::create('FacebookPageType', 'Page Type', $page_types)->setDescription("Default is 'website', see <a target='_blank' href=\"https://developers.facebook.com/docs/reference/opengraph#object-type\">https://developers.facebook.com/docs/reference/opengraph#object-type</a> for more information."));

        $fields->addFieldToTab('Root.SEO / Social', TextareaField::create('GoogleAnalyticsTrackingCode')->setDescription('Optional: For specific GA Campaign tracking. For general site GA code please go to the settings tab.'));

        // Header
        $fields->addFieldToTab('Root.Heading / Menu', HeaderField::create('Heading'));
        $fields->addFieldToTab('Root.Heading / Menu', TextField::create('SubText', 'Subtitle Text')->setDescription("This text will appear coloured. (eg. Pricing)"));
        $fields->addFieldToTab('Root.Heading / Menu', TextField::create('MainHeading', 'Main Heading'));
        $fields->addFieldToTab('Root.Heading / Menu', TextField::create('SubHeading', 'Sub Heading'));

        return $fields;
    }

    public static function GetObjectsArray($data)
    {
        $out = [];
        foreach ($data as $d) {
            $out[] = (method_exists($d, 'GetJSONData')) ? $d->GetJSONData() : $d->toMap();
        }
        return $out;
    }

    public static function GetObjectsJSON($data)
    {
        return json_encode(Page::GetObjectsArray($data));
    }

    public function OGTitle()
    {
        return (empty($this->FacebookPageTitle)) ? $this->Title : $this->FacebookPageTitle;
    }

    public function OGType()
    {
        return (empty($this->FacebookType)) ? 'website' : $this->FacebookType;
    }


    // function to get link ensuring that ?stage will not append to the end of it
    public function PageLink() {
        $parent = $this->Parent();
        $ParentURLSegments = '';

        while ($parent && $parent->exists()) {
            $ParentURLSegments =  $ParentURLSegments . $parent->URLSegment . '/';
            $parent = $parent->Parent();
        }

        return $ParentURLSegments . $this->URLSegment . '/';
    }

}
