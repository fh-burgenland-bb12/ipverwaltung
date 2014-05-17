<?php

namespace Ipverwaltung\Model\FirewallNat;
use Zend\Form\Form;
use Zend\Form\Element;

class FirewallNatForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$firewallId1 = new Element\Number('firewallId1');
		$firewallId1->setLabel('FirewallId1');
		$firewallId1->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewallId1);
		$firewallId2 = new Element\Number('firewallId2');
		$firewallId2->setLabel('FirewallId2');
		$firewallId2->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewallId2);
		$standortId = new Element\Number('standortId');
		$standortId->setLabel('StandortId');
		$standortId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($standortId);
		$ip1 = new Element\Text('ip1');
		$ip1->setLabel('Ip1');
		$ip1->setAttributes(array('type' => 'text'));
		$this->add($ip1);
		$port1 = new Element\Number('port1');
		$port1->setLabel('Port1');
		$port1->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($port1);
		$ip2 = new Element\Text('ip2');
		$ip2->setLabel('Ip2');
		$ip2->setAttributes(array('type' => 'text'));
		$this->add($ip2);
		$port2 = new Element\Number('port2');
		$port2->setLabel('Port2');
		$port2->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($port2);
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