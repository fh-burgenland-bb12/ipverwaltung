<?php

namespace Ipverwaltung\Model\Tinavpn;

interface TinavpnInterface
{
	public function getFirewall1();
	public function setFirewall1($firewall1);
	public function getFirewall2();
	public function setFirewall2($firewall2);
	public function getName();
	public function setName($name);
}