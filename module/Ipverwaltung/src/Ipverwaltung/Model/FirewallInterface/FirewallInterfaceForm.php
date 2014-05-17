<?php

namespace Ipverwaltung\Model\FirewallInterface;
use Zend\Form\Form;
use Zend\Form\Element;

class FirewallInterfaceForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$interfaceId = new Element\Number('interfaceId');
		$interfaceId->setLabel('InterfaceId');
		$interfaceId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($interfaceId);
		$firewallId = new Element\Number('firewallId');
		$firewallId->setLabel('FirewallId');
		$firewallId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewallId);
		$typ = new Element\Select('typ');
		$typ->setLabel('Typ');
		$typ->setAttributes(array());
		$typ->setValueOptions(array (
  0 => 'extern',
  1 => 'intern',
));
		$this->add($typ);
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