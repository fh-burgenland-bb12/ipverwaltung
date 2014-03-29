<?php

namespace Core\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Predicate\Operator;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Select;

class UserTable
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

    public function getUser($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('userId' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveUser(User $user)
    {
        $data = get_object_vars($user);
        unset($data['userId']);

        $id = (int)$user->userId;
        if ($id == 0) {
            $this->tableGateway->insert($data);
            return $this->tableGateway->getLastInsertValue();
        } else {
            if ($this->getUser($id)) {
                $this->tableGateway->update($data, array('userId' => $id));
                return $id;
            } else {
                throw new \Exception('User id does not exist');
            }
        }
    }

    public function deleteUser($id)
    {
        $this->dropUserFromGroup(null,$id);
        $this->tableGateway->delete(array('userId' => $id));
    }

    public function getUsersToGroup(Group $group)
    {
        $sql = $this->tableGateway->getSql();

        $select = $sql->select();
        $expression = new Expression('userGroup.userId = '.$this->tableGateway->getTable().'.userId AND (groupId='.intval($group->groupId).')');
        $select->join(
            'userGroup',$expression,
            array('groupId'),
            Select::JOIN_LEFT.' '.Select::JOIN_OUTER
        );
        //echo $select->getSqlString();exit();

        $result = $sql->prepareStatementForSqlObject($select)->execute();
        $users = array('member'=>array(),'available'=>array());
        $proto = $this->tableGateway->getResultSetPrototype()->getArrayObjectPrototype();
        foreach($result as $row)
        {
            $ins = ($row['groupId'])?'member':'available';
            $g = clone $proto;
            $g->exchangeArray($row);
            $users[$ins][] = $g;
        }
        return $users;
    }

    public function dropUserFromGroup(Group $group=null,$userId)
    {
        $where = new \Zend\Db\Sql\Where();
        $where->addPredicate(new Operator('userId',Operator::OPERATOR_EQUAL_TO,$userId));
        if($group)
        {
            $where->andPredicate(new Operator('groupId',Operator::OPERATOR_EQUAL_TO,$group->groupId));
        }

        $sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
        $del = $sql->delete('userGroup')->where($where);
        $sql->prepareStatementForSqlObject($del)->execute();
    }

    public function addUserToGroup(Group $group, $userId)
    {
        $sql = new \Zend\Db\Sql\Sql($this->tableGateway->getAdapter());
        $ins = $sql->insert('userGroup');
        $ins->values(array(
            'groupId'=>$group->groupId,
            'userId'=>$userId
        ));
        $sql->prepareStatementForSqlObject($ins)->execute();
    }
}
