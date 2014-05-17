<?php

namespace Ipverwaltung\Model\Firma;
use Zend\Form\Form;
use Zend\Form\Element;

class FirmaForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$firmaId = new Element\Number('firmaId');
		$firmaId->setLabel('FirmaId');
		$firmaId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firmaId);
		$name = new Element\Text('name');
		$name->setLabel('Name');
		$name->setAttributes(array('type' => 'text'));
		$this->add($name);
            $send = new Element('submit');
            $send->setLabel('');
            $send->setValue('Submit');
            $send->setAttributes(array(
                'type'  => 'submit'
            ));

            $this->add($send);

            $csrf = new Element\Csrf('csrf');
            $this->add($csrf);
	}
}