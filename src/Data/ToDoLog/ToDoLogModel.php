<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $toDoId;

/**
* @var \Nemundo\ToDo\Data\ToDo\ToDoExternalType
*/
public $toDo;

protected function loadModel() {
$this->tableName = "todo_to_do_log";
$this->aliasTableName = "todo_to_do_log";
$this->label = "To Do Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "todo_to_do_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "todo_to_do_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->toDoId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->toDoId->tableName = "todo_to_do_log";
$this->toDoId->fieldName = "to_do";
$this->toDoId->aliasFieldName = "todo_to_do_log_to_do";
$this->toDoId->label = "To Do";
$this->toDoId->allowNullValue = false;

}
public function loadToDo() {
if ($this->toDo == null) {
$this->toDo = new \Nemundo\ToDo\Data\ToDo\ToDoExternalType($this, "todo_to_do_log_to_do");
$this->toDo->tableName = "todo_to_do_log";
$this->toDo->fieldName = "to_do";
$this->toDo->aliasFieldName = "todo_to_do_log_to_do";
$this->toDo->label = "To Do";
}
return $this;
}
}