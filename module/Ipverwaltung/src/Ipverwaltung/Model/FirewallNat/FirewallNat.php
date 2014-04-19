<?php

namespace Ipverwaltung\Model\FirewallNat;
use Ipverwaltung\Model\ModelInterface;

class FirewallNat implements FirewallNatInterface, ModelInterface
{
	protected $firewallId1;
	protected $firewallId2;
	protected $standortId;
	protected $ip1;
	protected $port1;
	protected $ip2;
	protected $port2;

	public function getFirewallId1()
	{
		return $this->firewallId1;
	}

	public function setFirewallId1($firewallId1)
	{
		$this->firewallId1 = $firewallId1;
		return $this;
	}

	public function getFirewallId2()
	{
		return $this->firewallId2;
	}

	public function setFirewallId2($firewallId2)
	{
		$this->firewallId2 = $firewallId2;
		return $this;
	}

	public function getStandortId()
	{
		return $this->standortId;
	}

	public function setStandortId($standortId)
	{
		$this->standortId = $standortId;
		return $this;
	}

	public function getIp1()
	{
		return $this->ip1;
	}

	public function setIp1($ip1)
	{
		$this->ip1 = $ip1;
		return $this;
	}

	public function getPort1()
	{
		return $this->port1;
	}

	public function setPort1($port1)
	{
		$this->port1 = $port1;
		return $this;
	}

	public function getIp2()
	{
		return $this->ip2;
	}

	public function setIp2($ip2)
	{
		$this->ip2 = $ip2;
		return $this;
	}

	public function getPort2()
	{
		return $this->port2;
	}

	public function setPort2($port2)
	{
		$this->port2 = $port2;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['firewallId1'])) $this->setFirewallId1($data['firewallId1']);
		if(isset($data['firewallId2'])) $this->setFirewallId2($data['firewallId2']);
		if(isset($data['standortId'])) $this->setStandortId($data['standortId']);
		if(isset($data['ip1'])) $this->setIp1($data['ip1']);
		if(isset($data['port1'])) $this->setPort1($data['port1']);
		if(isset($data['ip2'])) $this->setIp2($data['ip2']);
		if(isset($data['port2'])) $this->setPort2($data['port2']);
	}

	public function toArray()
	{
		$data = array();
		$data['firewallId1'] = $this->getFirewallId1();
		$data['firewallId2'] = $this->getFirewallId2();
		$data['standortId'] = $this->getStandortId();
		$data['ip1'] = $this->getIp1();
		$data['port1'] = $this->getPort1();
		$data['ip2'] = $this->getIp2();
		$data['port2'] = $this->getPort2();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'firewallId1',
  1 => 'firewallId2',
  2 => 'standortId',
);
	}

}