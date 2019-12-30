<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
* @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Process\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

protected function loadModel() {
$this->tableName = "todo_todo";
$this->aliasTableName = "todo_todo";
$this->label = "To Do";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

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

$this->userId = new \Nemundo\Model\Type\External\Id\ExternalUniqueIdType($this);
$this->userId->tableName = "todo_todo";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "todo_todo_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;


$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "user";
$index->addType($this->userId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "todo_todo_user");
$this->user->tableName = "todo_todo";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "todo_todo_user";
$this->user->label = "User";
}
return $this;
}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Process\Workflow\Data\Workflow\WorkflowExternalType($this, "todo_todo_workflow");
$this->workflow->tableName = "todo_todo";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "todo_todo_workflow";
$this->workflow->label = "Workflow";
}
return $this;
}
}