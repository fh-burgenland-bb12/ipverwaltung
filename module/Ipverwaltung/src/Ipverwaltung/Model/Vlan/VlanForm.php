<?php

namespace Ipverwaltung\Model\Vlan;
use Zend\Form\Form;
use Zend\Form\Element;

class VlanForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$vlanId = new Element\Number('vlanId');
		$vlanId->setLabel('VlanId');
		$vlanId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($vlanId);
		$bezeichnung = new Element\Text('bezeichnung');
		$bezeichnung->setLabel('Bezeichnung');
		$bezeichnung->setAttributes(array('type' => 'text'));
		$this->add($bezeichnung);
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