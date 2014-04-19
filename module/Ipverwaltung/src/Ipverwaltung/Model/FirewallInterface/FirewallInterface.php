<?php

namespace Ipverwaltung\Model\FirewallInterface;
use Ipverwaltung\Model\ModelInterface;

class FirewallInterface implements FirewallInterfaceInterface, ModelInterface
{
	protected $interfaceId;
	protected $firewallId;
	protected $typ;
	protected $name;

	public function getInterfaceId()
	{
		return $this->interfaceId;
	}

	public function setInterfaceId($interfaceId)
	{
		$this->interfaceId = $interfaceId;
		return $this;
	}

	public function getFirewallId()
	{
		return $this->firewallId;
	}

	public function setFirewallId($firewallId)
	{
		$this->firewallId = $firewallId;
		return $this;
	}

	public function getTyp()
	{
		return $this->typ;
	}

	public function setTyp($typ)
	{
		$this->typ = $typ;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['interfaceId'])) $this->setInterfaceId($data['interfaceId']);
		if(isset($data['firewallId'])) $this->setFirewallId($data['firewallId']);
		if(isset($data['typ'])) $this->setTyp($data['typ']);
		if(isset($data['name'])) $this->setName($data['name']);
	}

	public function toArray()
	{
		$data = array();
		$data['interfaceId'] = $this->getInterfaceId();
		$data['firewallId'] = $this->getFirewallId();
		$data['typ'] = $this->getTyp();
		$data['name'] = $this->getName();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'interfaceId',
);
	}

}