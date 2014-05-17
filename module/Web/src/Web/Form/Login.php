<?php
namespace Web\Form;
use Zend\Form\Form;
use Zend\Form\Element;

class Login extends Form
{
    public function __construct()
    {
        parent::__construct();
        //$this->setMethod('post');

        $username = new Element('user');
        $username->setLabel('Username:');
        $username->setAttributes(array(
            'type'  => 'text'
        ));
        $this->add($username);

        $pw = new Element\Password('password');
        $pw->setLabel('Passwort:');

        $this->add($pw);

        $send = new Element('submit_auth');
        $send->setLabel('Login');
        $send->setValue('Submit');
        $send->setAttributes(array(
            'type'  => 'submit'
        ));

        $this->add($send);

        $csrf = new Element\Csrf('csrf');
        $this->add($csrf);

    }
}
