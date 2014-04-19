<?php

namespace Ipverwaltung\Model\FirewallNat;

interface FirewallNatInterface
{
	public function getFirewallId1();
	public function setFirewallId1($firewallId1);
	public function getFirewallId2();
	public function setFirewallId2($firewallId2);
	public function getStandortId();
	public function setStandortId($standortId);
	public function getIp1();
	public function setIp1($ip1);
	public function getPort1();
	public function setPort1($port1);
	public function getIp2();
	public function setIp2($ip2);
	public function getPort2();
	public function setPort2($port2);
}