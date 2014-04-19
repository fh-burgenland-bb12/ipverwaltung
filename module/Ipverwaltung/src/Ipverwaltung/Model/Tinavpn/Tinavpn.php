<?php

namespace Ipverwaltung\Model\Tinavpn;
use Ipverwaltung\Model\ModelInterface;

class Tinavpn implements TinavpnInterface, ModelInterface
{
	protected $firewall1;
	protected $firewall2;
	protected $name;

	public function getFirewall1()
	{
		return $this->firewall1;
	}

	public function setFirewall1($firewall1)
	{
		$this->firewall1 = $firewall1;
		return $this;
	}

	public function getFirewall2()
	{
		return $this->firewall2;
	}

	public function setFirewall2($firewall2)
	{
		$this->firewall2 = $firewall2;
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
		if(isset($data['firewall1'])) $this->setFirewall1($data['firewall1']);
		if(isset($data['firewall2'])) $this->setFirewall2($data['firewall2']);
		if(isset($data['name'])) $this->setName($data['name']);
	}

	public function toArray()
	{
		$data = array();
		$data['firewall1'] = $this->getFirewall1();
		$data['firewall2'] = $this->getFirewall2();
		$data['name'] = $this->getName();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'firewall1',
  1 => 'firewall2',
);
	}

}