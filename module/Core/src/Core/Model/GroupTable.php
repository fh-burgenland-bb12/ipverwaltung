<?php

namespace Core\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Predicate\Operator;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;

class GroupTable
{
    /**
     * @var \Zend\Db\TableGateway\TableGateway
     */
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getGroup($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('groupId' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveGroup(Group $group)
    {
        $data = get_object_vars($group);
        unset($data['groupId']);

        $id = (int)$group->groupId;
        if ($id == 0) {
            $this->tableGateway->insert($data);
            return $this->tableGateway->getLastInsertValue();
        } else {
            if ($this->getGroup($id)) {
                $this->tableGateway->update($data, array('groupId' => $id));
                return $id;
            } else {
                throw new \Exception('Group id does not exist');
            }
        }
    }

    public function deleteGroup($id)
    {
        $this->dropGroupFromModule(null,$id);
        $this->tableGateway->delete(array('groupId' => $id));
    }
}
