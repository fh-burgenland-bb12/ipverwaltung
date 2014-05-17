<?php
namespace Core\Model;

class Group
{
    public $groupId;
    public $name;


    public function exchangeArray($data)
    {
        $this->groupId     = (isset($data['groupId'])) ? $data['groupId'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
    }
}
