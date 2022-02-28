<?php
class ContactPageController extends PageController
{
    private static $allowed_actions = [
        'ContactPageForm'
    ];

    public function ContactPageForm()
    {
        return new ContactPageForm($this, "ContactPageForm");
    }
}
