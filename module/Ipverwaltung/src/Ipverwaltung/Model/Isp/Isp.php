<?php

namespace Ipverwaltung\Model\Isp;
use Ipverwaltung\Model\ModelInterface;

class Isp implements IspInterface, ModelInterface
{
	protected $ispId;
	protected $ip;
	protected $subnet;
	protected $firewallId;
	protected $verbindungstyp;
	protected $ansprechpartner;
	protected $telefonnummer;

	public function getIspId()
	{
		return $this->ispId;
	}

	public function setIspId($ispId)
	{
		$this->ispId = $ispId;
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

	public function getSubnet()
	{
		return $this->subnet;
	}

	public function setSubnet($subnet)
	{
		$this->subnet = $subnet;
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

	public function getVerbindungstyp()
	{
		return $this->verbindungstyp;
	}

	public function setVerbindungstyp($verbindungstyp)
	{
		$this->verbindungstyp = $verbindungstyp;
		return $this;
	}

	public function getAnsprechpartner()
	{
		return $this->ansprechpartner;
	}

	public function setAnsprechpartner($ansprechpartner)
	{
		$this->ansprechpartner = $ansprechpartner;
		return $this;
	}

	public function getTelefonnummer()
	{
		return $this->telefonnummer;
	}

	public function setTelefonnummer($telefonnummer)
	{
		$this->telefonnummer = $telefonnummer;
		return $this;
	}

	public function exchangeArray($data)
	{
		if(isset($data['ispId'])) $this->setIspId($data['ispId']);
		if(isset($data['ip'])) $this->setIp($data['ip']);
		if(isset($data['subnet'])) $this->setSubnet($data['subnet']);
		if(isset($data['firewallId'])) $this->setFirewallId($data['firewallId']);
		if(isset($data['verbindungstyp'])) $this->setVerbindungstyp($data['verbindungstyp']);
		if(isset($data['ansprechpartner'])) $this->setAnsprechpartner($data['ansprechpartner']);
		if(isset($data['telefonnummer'])) $this->setTelefonnummer($data['telefonnummer']);
	}

	public function toArray()
	{
		$data = array();
		$data['ispId'] = $this->getIspId();
		$data['ip'] = $this->getIp();
		$data['subnet'] = $this->getSubnet();
		$data['firewallId'] = $this->getFirewallId();
		$data['verbindungstyp'] = $this->getVerbindungstyp();
		$data['ansprechpartner'] = $this->getAnsprechpartner();
		$data['telefonnummer'] = $this->getTelefonnummer();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'ispId',
);
	}

}