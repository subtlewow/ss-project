<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class ContactPageForm extends Form
{
    protected $template = 'Includes/ContactForm';

    public function __construct($controller, $name)
    {
        $fields = FieldList::create(
            TextField::create('Name'),
            EmailField::create('Email'),
            HTMLEditorField::create('Message')
        );

        $actions = FieldList::create(
            FormAction::create('sendContactForm')
                ->setTitle('Send')
                ->setUseButtonTag(true)
                ->addExtraClass('border border-green-400 flex flex-start hover:bg-red-500 transition shadow-md rounded w-16 px-3 py-1 mt-5'),
        );

        $validator = new RequiredFields('Name', Email::class);
        parent::__construct($controller, $name, $fields, $actions, $validator);

        foreach($fields as $field) {
            $field
                ->addExtraClass('w-full border border-green-400 pb-2')
                ->setAttribute('placeholder', $field->getName());
        }
    }

    public function sendContactForm($data, $form)
    {

        // get every key+value for each key-value pair and then make one giant string

        $to = "Marlon@devart.nz";
        $from = 'no-reply@test.com';
        $subject = 'test ignore';
        $email = new Email($from, $to, $subject, 'hello');
        $email->send();

        return $this->redirectBack();
    }


}
