<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $toDoId;

/**
* @var \Nemundo\ToDo\Data\ToDo\ToDoExternalType
*/
public $toDo;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ToDoLogModel::class;
$this->externalTableName = "todo_to_do_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->toDoId = new \Nemundo\Model\Type\Id\IdType();
$this->toDoId->fieldName = "to_do";
$this->toDoId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->toDoId->aliasFieldName = $this->toDoId->tableName ."_".$this->toDoId->fieldName;
$this->toDoId->label = "To Do";
$this->addType($this->toDoId);

}
public function loadToDo() {
if ($this->toDo == null) {
$this->toDo = new \Nemundo\ToDo\Data\ToDo\ToDoExternalType(null, $this->parentFieldName . "_to_do");
$this->toDo->fieldName = "to_do";
$this->toDo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->toDo->aliasFieldName = $this->toDo->tableName ."_".$this->toDo->fieldName;
$this->toDo->label = "To Do";
$this->addType($this->toDo);
}
return $this;
}
}