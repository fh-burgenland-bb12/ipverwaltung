<?php

namespace Ipverwaltung\Model\Firewall;
use Zend\Form\Form;
use Zend\Form\Element;

class FirewallForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$firewallId = new Element\Number('firewallId');
		$firewallId->setLabel('FirewallId');
		$firewallId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($firewallId);
		$typId = new Element\Number('typId');
		$typId->setLabel('TypId');
		$typId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($typId);
		$seriennummer = new Element\Text('seriennummer');
		$seriennummer->setLabel('Seriennummer');
		$seriennummer->setAttributes(array (
  'type' => 'text',
));
		$this->add($seriennummer);
		$inventarnummer = new Element\Text('inventarnummer');
		$inventarnummer->setLabel('Inventarnummer');
		$inventarnummer->setAttributes(array (
  'type' => 'text',
));
		$this->add($inventarnummer);
		$lieferdatum = new Element('lieferdatum');
		$lieferdatum->setLabel('Lieferdatum');
		$lieferdatum->setAttributes(array (
));
		$this->add($lieferdatum);
		$managementIp = new Element\Text('managementIp');
		$managementIp->setLabel('ManagementIp');
		$managementIp->setAttributes(array (
  'type' => 'text',
));
		$this->add($managementIp);
		$gateway = new Element\Text('gateway');
		$gateway->setLabel('Gateway');
		$gateway->setAttributes(array (
  'type' => 'text',
));
		$this->add($gateway);
		$bemerkung = new Element\Text('bemerkung');
		$bemerkung->setLabel('Bemerkung');
		$bemerkung->setAttributes(array (
  'type' => 'text',
));
		$this->add($bemerkung);
		$proxyIp = new Element\Text('proxyIp');
		$proxyIp->setLabel('ProxyIp');
		$proxyIp->setAttributes(array (
  'type' => 'text',
));
		$this->add($proxyIp);
		$proxyport = new Element\Number('proxyport');
		$proxyport->setLabel('Proxyport');
		$proxyport->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($proxyport);
		$standortId = new Element\Number('standortId');
		$standortId->setLabel('StandortId');
		$standortId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($standortId);
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