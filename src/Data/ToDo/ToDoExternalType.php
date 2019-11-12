<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $toDo;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ToDoModel::class;
$this->externalTableName = "todo_to_do";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->toDo = new \Nemundo\Model\Type\Text\TextType();
$this->toDo->fieldName = "to_do";
$this->toDo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->toDo->aliasFieldName = $this->toDo->tableName . "_" . $this->toDo->fieldName;
$this->toDo->label = "To Do";
$this->addType($this->toDo);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Done";
$this->addType($this->done);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
}