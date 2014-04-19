<?php

namespace Ipverwaltung\Model\Ipsec;

interface IpsecInterface
{
	public function getIpsecId();
	public function setIpsecId($ipsecId);
	public function getFirewallId();
	public function setFirewallId($firewallId);
	public function getIp();
	public function setIp($ip);
	public function getBemerkung();
	public function setBemerkung($bemerkung);
}