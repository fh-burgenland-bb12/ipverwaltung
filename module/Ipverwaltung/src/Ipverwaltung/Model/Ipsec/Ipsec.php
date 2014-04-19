<?php

namespace Ipverwaltung\Model\Ipsec;
use Ipverwaltung\Model\ModelInterface;

class Ipsec implements IpsecInterface, ModelInterface
{
	protected $ipsecId;
	protected $firewallId;
	protected $ip;
	protected $bemerkung;

	public function getIpsecId()
	{
		return $this->ipsecId;
	}

	public function setIpsecId($ipsecId)
	{
		$this->ipsecId = $ipsecId;
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

	public function getIp()
	{
		return $this->ip;
	}

	public function setIp($ip)
	{
		$this->ip = $ip;
		return $this;
	}

	public function getBemerkung()
	{
		return $this->bemerkung;
	}

	public function setBemerkung($bemerkung)
	{
		$this->bemerkung = $bemerkung;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['ipsecId'])) $this->setIpsecId($data['ipsecId']);
		if(isset($data['firewallId'])) $this->setFirewallId($data['firewallId']);
		if(isset($data['ip'])) $this->setIp($data['ip']);
		if(isset($data['bemerkung'])) $this->setBemerkung($data['bemerkung']);
	}

	public function toArray()
	{
		$data = array();
		$data['ipsecId'] = $this->getIpsecId();
		$data['firewallId'] = $this->getFirewallId();
		$data['ip'] = $this->getIp();
		$data['bemerkung'] = $this->getBemerkung();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'ipsecId',
);
	}

}