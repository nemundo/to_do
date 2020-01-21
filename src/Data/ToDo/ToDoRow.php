<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ToDoModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $toDo;

/**
* @var bool
*/
public $done;

/**
* @var string
*/
public $workflowId;

/**
* @var \Nemundo\Process\Workflow\Row\WorkflowCustomRow
*/
public $workflow;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->toDo = $this->getModelValue($model->toDo);
$this->done = boolval($this->getModelValue($model->done));
$this->workflowId = $this->getModelValue($model->workflowId);
if ($model->workflow !== null) {
$this->loadNemundoProcessWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
}
private function loadNemundoProcessWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Process\Workflow\Row\WorkflowCustomRow($this->row, $model);
}
}