<?php

namespace Ipverwaltung\Model\FirewallDhcp;

interface FirewallDhcpInterface
{
	public function getFirewalldhcpId();
	public function setFirewalldhcpId($firewalldhcpId);
	public function getFirewallId();
	public function setFirewallId($firewallId);
	public function getRangebeginn();
	public function setRangebeginn($rangebeginn);
	public function getRangeende();
	public function setRangeende($rangeende);
	public function getVlanId();
	public function setVlanId($vlanId);
}