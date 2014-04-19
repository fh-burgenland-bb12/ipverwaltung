<?php

namespace Ipverwaltung\Model\AccesspointIp;
use Ipverwaltung\Model\ModelInterface;

class AccesspointIp implements AccesspointIpInterface, ModelInterface
{
	protected $accesspointIpId;
	protected $accesspoint;
	protected $ip;
	protected $vlanId;

	public function getAccesspointIpId()
	{
		return $this->accesspointIpId;
	}

	public function setAccesspointIpId($accesspointIpId)
	{
		$this->accesspointIpId = $accesspointIpId;
		return $this;
	}

	public function getAccesspoint()
	{
		return $this->accesspoint;
	}

	public function setAccesspoint($accesspoint)
	{
		$this->accesspoint = $accesspoint;
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
		if(isset($data['accesspointIpId'])) $this->setAccesspointIpId($data['accesspointIpId']);
		if(isset($data['accesspoint'])) $this->setAccesspoint($data['accesspoint']);
		if(isset($data['ip'])) $this->setIp($data['ip']);
		if(isset($data['vlanId'])) $this->setVlanId($data['vlanId']);
	}

	public function toArray()
	{
		$data = array();
		$data['accesspointIpId'] = $this->getAccesspointIpId();
		$data['accesspoint'] = $this->getAccesspoint();
		$data['ip'] = $this->getIp();
		$data['vlanId'] = $this->getVlanId();
		return $data;
	}

	public function getPrimaryFields()
	{
		return array (
  0 => 'accesspointIpId',
);
	}

}