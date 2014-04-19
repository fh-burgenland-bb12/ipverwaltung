<?php

namespace Ipverwaltung\Model\Ipsec;
use Zend\Form\Form;
use Zend\Form\Element;

class IpsecForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$ipsecId = new Element\Number('ipsecId');
		$ipsecId->setLabel('IpsecId');
		$ipsecId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($ipsecId);
		$firewallId = new Element\Number('firewallId');
		$firewallId->setLabel('FirewallId');
		$firewallId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($firewallId);
		$ip = new Element\Text('ip');
		$ip->setLabel('Ip');
		$ip->setAttributes(array (
  'type' => 'text',
));
		$this->add($ip);
		$bemerkung = new Element\Text('bemerkung');
		$bemerkung->setLabel('Bemerkung');
		$bemerkung->setAttributes(array (
  'type' => 'text',
));
		$this->add($bemerkung);
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