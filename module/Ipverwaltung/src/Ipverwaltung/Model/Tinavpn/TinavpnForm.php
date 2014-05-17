<?php

namespace Ipverwaltung\Model\Tinavpn;
use Zend\Form\Form;
use Zend\Form\Element;

class TinavpnForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$firewall1 = new Element\Number('firewall1');
		$firewall1->setLabel('Firewall1');
		$firewall1->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewall1);
		$firewall2 = new Element\Number('firewall2');
		$firewall2->setLabel('Firewall2');
		$firewall2->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewall2);
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