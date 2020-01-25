<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoModel extends \Nemundo\Process\Workflow\Model\AbstractWorkflowModel {
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

protected function loadModel() {
$this->tableName = "todo_todo";
$this->aliasTableName = "todo_todo";
$this->label = "To Do";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "todo_todo";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "todo_todo_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;











$this->toDo = new \Nemundo\Model\Type\Text\TextType($this);
$this->toDo->tableName = "todo_todo";
$this->toDo->fieldName = "to_do";
$this->toDo->aliasFieldName = "todo_todo_to_do";
$this->toDo->label = "To Do";
$this->toDo->allowNullValue = false;
$this->toDo->length = 255;

$this->done = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->done->tableName = "todo_todo";
$this->done->fieldName = "done";
$this->done->aliasFieldName = "todo_todo_done";
$this->done->label = "Done";
$this->done->allowNullValue = false;

}
}