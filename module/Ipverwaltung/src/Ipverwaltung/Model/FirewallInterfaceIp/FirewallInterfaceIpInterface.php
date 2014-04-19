<?php

namespace Ipverwaltung\Model\FirewallInterfaceIp;

interface FirewallInterfaceIpInterface
{
	public function getInterfaceId();
	public function setInterfaceId($interfaceId);
	public function getIpadresse();
	public function setIpadresse($ipadresse);
	public function getVlanId();
	public function setVlanId($vlanId);
}