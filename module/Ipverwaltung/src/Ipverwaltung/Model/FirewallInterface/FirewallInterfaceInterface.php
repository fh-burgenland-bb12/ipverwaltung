<?php

namespace Ipverwaltung\Model\FirewallInterface;

interface FirewallInterfaceInterface
{
	public function getInterfaceId();
	public function setInterfaceId($interfaceId);
	public function getFirewallId();
	public function setFirewallId($firewallId);
	public function getTyp();
	public function setTyp($typ);
	public function getName();
	public function setName($name);
}