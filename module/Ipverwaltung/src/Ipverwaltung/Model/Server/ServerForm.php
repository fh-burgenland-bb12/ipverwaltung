<?php

namespace Ipverwaltung\Model\Server;
use Zend\Form\Form;
use Zend\Form\Element;

class ServerForm extends Form
{

    public function __construct()
    {
        parent::__construct();		$serverId = new Element\Number('serverId');
		$serverId->setLabel('ServerId');
		$serverId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($serverId);
		$ip = new Element\Text('ip');
		$ip->setLabel('Ip');
		$ip->setAttributes(array (
  'type' => 'text',
));
		$this->add($ip);
		$name = new Element\Text('name');
		$name->setLabel('Name');
		$name->setAttributes(array (
  'type' => 'text',
));
		$this->add($name);
		$beschreibung = new Element\Text('beschreibung');
		$beschreibung->setLabel('Beschreibung');
		$beschreibung->setAttributes(array (
  'type' => 'text',
));
		$this->add($beschreibung);
		$vlanId = new Element\Number('vlanId');
		$vlanId->setLabel('VlanId');
		$vlanId->setAttributes(array (
  'type' => 'number',
  'min' => '0',
));
		$this->add($vlanId);
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