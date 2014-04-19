<?php

namespace Ipverwaltung\Model\FirewallDhcp;
use Ipverwaltung\Model\ModelInterface;

class FirewallDhcp implements FirewallDhcpInterface, ModelInterface
{
	protected $firewalldhcpId;
	protected $firewallId;
	protected $rangebeginn;
	protected $rangeende;
	protected $vlanId;

	public function getFirewalldhcpId()
	{
		return $this->firewalldhcpId;
	}

	public function setFirewalldhcpId($firewalldhcpId)
	{
		$this->firewalldhcpId = $firewalldhcpId;
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

	public function getRangebeginn()
	{
		return $this->rangebeginn;
	}

	public function setRangebeginn($rangebeginn)
	{
		$this->rangebeginn = $rangebeginn;
		return $this;
	}

	public function getRangeende()
	{
		return $this->rangeende;
	}

	public function setRangeende($rangeende)
	{
		$this->rangeende = $rangeende;
		return $this;
	}

	public function getVlanId()
	{
		return $this->vlanId;
	}

	public function setVlanId($vlanId)
	{
		$this->vlanId = $vlanId;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['firewalldhcpId'])) $this->setFirewalldhcpId($data['firewalldhcpId']);
		if(isset($data['firewallId'])) $this->setFirewallId($data['firewallId']);
		if(isset($data['rangebeginn'])) $this->setRangebeginn($data['rangebeginn']);
		if(isset($data['rangeende'])) $this->setRangeende($data['rangeende']);
		if(isset($data['vlanId'])) $this->setVlanId($data['vlanId']);
	}

	public function toArray()
	{
		$data = array();
		$data['firewalldhcpId'] = $this->getFirewalldhcpId();
		$data['firewallId'] = $this->getFirewallId();
		$data['rangebeginn'] = $this->getRangebeginn();
		$data['rangeende'] = $this->getRangeende();
		$data['vlanId'] = $this->getVlanId();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'firewalldhcpId',
);
	}

}