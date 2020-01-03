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
public $workflowId;

/**
* @var \Nemundo\Process\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ToDoModel::class;
$this->externalTableName = "todo_todo";
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

$this->workflowId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowId->fieldName = "id";
$this->workflowId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowId->aliasFieldName = $this->workflowId->tableName ."_".$this->workflowId->fieldName;
$this->workflowId->label = "Workflow";
$this->addType($this->workflowId);

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Process\Workflow\Data\Workflow\WorkflowExternalType(null, $this->parentFieldName . "_id");
$this->workflow->fieldName = "id";
$this->workflow->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflow->aliasFieldName = $this->workflow->tableName ."_".$this->workflow->fieldName;
$this->workflow->label = "Workflow";
$this->addType($this->workflow);
}
return $this;
}
}