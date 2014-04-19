<?php

namespace Ipverwaltung\Model\Firewall;
use Ipverwaltung\Model\ModelInterface;

class Firewall implements FirewallInterface, ModelInterface
{
	protected $firewallId;
	protected $typId;
	protected $seriennummer;
	protected $inventarnummer;
	protected $lieferdatum;
	protected $managementIp;
	protected $gateway;
	protected $bemerkung;
	protected $proxyIp;
	protected $proxyport;
	protected $standortId;

	public function getFirewallId()
	{
		return $this->firewallId;
	}

	public function setFirewallId($firewallId)
	{
		$this->firewallId = $firewallId;
		return $this;
	}

	public function getTypId()
	{
		return $this->typId;
	}

	public function setTypId($typId)
	{
		$this->typId = $typId;
		return $this;
	}

	public function getSeriennummer()
	{
		return $this->seriennummer;
	}

	public function setSeriennummer($seriennummer)
	{
		$this->seriennummer = $seriennummer;
		return $this;
	}

	public function getInventarnummer()
	{
		return $this->inventarnummer;
	}

	public function setInventarnummer($inventarnummer)
	{
		$this->inventarnummer = $inventarnummer;
		return $this;
	}

	public function getLieferdatum()
	{
		return $this->lieferdatum;
	}

	public function setLieferdatum($lieferdatum)
	{
		$this->lieferdatum = $lieferdatum;
		return $this;
	}

	public function getManagementIp()
	{
		return $this->managementIp;
	}

	public function setManagementIp($managementIp)
	{
		$this->managementIp = $managementIp;
		return $this;
	}

	public function getGateway()
	{
		return $this->gateway;
	}

	public function setGateway($gateway)
	{
		$this->gateway = $gateway;
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

	public function getProxyIp()
	{
		return $this->proxyIp;
	}

	public function setProxyIp($proxyIp)
	{
		$this->proxyIp = $proxyIp;
		return $this;
	}

	public function getProxyport()
	{
		return $this->proxyport;
	}

	public function setProxyport($proxyport)
	{
		$this->proxyport = $proxyport;
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

	public function exchangeArray($data)
	{
		if(isset($data['firewallId'])) $this->setFirewallId($data['firewallId']);
		if(isset($data['typId'])) $this->setTypId($data['typId']);
		if(isset($data['seriennummer'])) $this->setSeriennummer($data['seriennummer']);
		if(isset($data['inventarnummer'])) $this->setInventarnummer($data['inventarnummer']);
		if(isset($data['lieferdatum'])) $this->setLieferdatum($data['lieferdatum']);
		if(isset($data['managementIp'])) $this->setManagementIp($data['managementIp']);
		if(isset($data['gateway'])) $this->setGateway($data['gateway']);
		if(isset($data['bemerkung'])) $this->setBemerkung($data['bemerkung']);
		if(isset($data['proxyIp'])) $this->setProxyIp($data['proxyIp']);
		if(isset($data['proxyport'])) $this->setProxyport($data['proxyport']);
		if(isset($data['standortId'])) $this->setStandortId($data['standortId']);
	}

	public function toArray()
	{
		$data = array();
		$data['firewallId'] = $this->getFirewallId();
		$data['typId'] = $this->getTypId();
		$data['seriennummer'] = $this->getSeriennummer();
		$data['inventarnummer'] = $this->getInventarnummer();
		$data['lieferdatum'] = $this->getLieferdatum();
		$data['managementIp'] = $this->getManagementIp();
		$data['gateway'] = $this->getGateway();
		$data['bemerkung'] = $this->getBemerkung();
		$data['proxyIp'] = $this->getProxyIp();
		$data['proxyport'] = $this->getProxyport();
		$data['standortId'] = $this->getStandortId();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'firewallId',
);
	}

}