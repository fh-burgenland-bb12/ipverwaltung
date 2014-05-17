<?php

namespace Ipverwaltung\Model\FirewallDhcp;
use Zend\Form\Form;
use Zend\Form\Element;

class FirewallDhcpForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$firewalldhcpId = new Element\Number('firewalldhcpId');
		$firewalldhcpId->setLabel('FirewalldhcpId');
		$firewalldhcpId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewalldhcpId);
		$firewallId = new Element\Number('firewallId');
		$firewallId->setLabel('FirewallId');
		$firewallId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewallId);
		$rangebeginn = new Element\Text('rangebeginn');
		$rangebeginn->setLabel('Rangebeginn');
		$rangebeginn->setAttributes(array('type' => 'text'));
		$this->add($rangebeginn);
		$rangeende = new Element\Text('rangeende');
		$rangeende->setLabel('Rangeende');
		$rangeende->setAttributes(array('type' => 'text'));
		$this->add($rangeende);
		$vlanId = new Element\Number('vlanId');
		$vlanId->setLabel('VlanId');
		$vlanId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
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