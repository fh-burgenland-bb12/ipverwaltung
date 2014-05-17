<?php

namespace Ipverwaltung\Model\Isp;
use Zend\Form\Form;
use Zend\Form\Element;

class IspForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$ispId = new Element\Number('ispId');
		$ispId->setLabel('IspId');
		$ispId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($ispId);
		$ip = new Element\Text('ip');
		$ip->setLabel('Ip');
		$ip->setAttributes(array('type' => 'text'));
		$this->add($ip);
		$subnet = new Element\Text('subnet');
		$subnet->setLabel('Subnet');
		$subnet->setAttributes(array('type' => 'text'));
		$this->add($subnet);
		$firewallId = new Element\Number('firewallId');
		$firewallId->setLabel('FirewallId');
		$firewallId->setAttributes(array(
                'type' => 'number',
                'min' => '0'
                ));
		$this->add($firewallId);
		$verbindungstyp = new Element\Text('verbindungstyp');
		$verbindungstyp->setLabel('Verbindungstyp');
		$verbindungstyp->setAttributes(array('type' => 'text'));
		$this->add($verbindungstyp);
		$ansprechpartner = new Element\Text('ansprechpartner');
		$ansprechpartner->setLabel('Ansprechpartner');
		$ansprechpartner->setAttributes(array('type' => 'text'));
		$this->add($ansprechpartner);
		$telefonnummer = new Element\Text('telefonnummer');
		$telefonnummer->setLabel('Telefonnummer');
		$telefonnummer->setAttributes(array('type' => 'text'));
		$this->add($telefonnummer);
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