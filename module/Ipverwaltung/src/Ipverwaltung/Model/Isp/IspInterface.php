<?php

namespace Ipverwaltung\Model\Isp;

interface IspInterface
{
	public function getIspId();
	public function setIspId($ispId);
	public function getIp();
	public function setIp($ip);
	public function getSubnet();
	public function setSubnet($subnet);
	public function getFirewallId();
	public function setFirewallId($firewallId);
	public function getVerbindungstyp();
	public function setVerbindungstyp($verbindungstyp);
	public function getAnsprechpartner();
	public function setAnsprechpartner($ansprechpartner);
	public function getTelefonnummer();
	public function setTelefonnummer($telefonnummer);
}