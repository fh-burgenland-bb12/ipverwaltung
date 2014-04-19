<?php

namespace Ipverwaltung\Model\Firewall;

interface FirewallInterface
{
	public function getFirewallId();
	public function setFirewallId($firewallId);
	public function getTypId();
	public function setTypId($typId);
	public function getSeriennummer();
	public function setSeriennummer($seriennummer);
	public function getInventarnummer();
	public function setInventarnummer($inventarnummer);
	public function getLieferdatum();
	public function setLieferdatum($lieferdatum);
	public function getManagementIp();
	public function setManagementIp($managementIp);
	public function getGateway();
	public function setGateway($gateway);
	public function getBemerkung();
	public function setBemerkung($bemerkung);
	public function getProxyIp();
	public function setProxyIp($proxyIp);
	public function getProxyport();
	public function setProxyport($proxyport);
	public function getStandortId();
	public function setStandortId($standortId);
}