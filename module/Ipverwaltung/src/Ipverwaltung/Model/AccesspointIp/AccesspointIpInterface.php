<?php

namespace Ipverwaltung\Model\AccesspointIp;

interface AccesspointIpInterface
{
	public function getAccesspointIpId();
	public function setAccesspointIpId($accesspointIpId);
	public function getAccesspoint();
	public function setAccesspoint($accesspoint);
	public function getIp();
	public function setIp($ip);
	public function getVlanId();
	public function setVlanId($vlanId);
}