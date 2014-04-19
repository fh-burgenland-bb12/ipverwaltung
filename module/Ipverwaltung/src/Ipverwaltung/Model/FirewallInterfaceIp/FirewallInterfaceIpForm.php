<?php

namespace Ipverwaltung\Model\FirewallInterfaceIp;
use Zend\Form\Form;
use Zend\Form\Element;

class FirewallInterfaceIpForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$interfaceId = new Element\Number('interfaceId');
		$interfaceId->setLabel('InterfaceId');
		$interfaceId->setAttributes(array (
  'type' => 'number',
));
		$this->add($interfaceId);
		$ipadresse = new Element\Text('ipadresse');
		$ipadresse->setLabel('Ipadresse');
		$ipadresse->setAttributes(array (
  'type' => 'text',
));
		$this->add($ipadresse);
		$vlanId = new Element\Number('vlanId');
		$vlanId->setLabel('VlanId');
		$vlanId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($vlanId);
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