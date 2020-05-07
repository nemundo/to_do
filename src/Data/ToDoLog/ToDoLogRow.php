<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ToDoLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $toDoId;

/**
* @var \Nemundo\ToDo\Data\ToDo\ToDoRow
*/
public $toDo;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->toDoId = intval($this->getModelValue($model->toDoId));
if ($model->toDo !== null) {
$this->loadNemundoToDoDataToDoToDotoDoRow($model->toDo);
}
}
private function loadNemundoToDoDataToDoToDotoDoRow($model) {
$this->toDo = new \Nemundo\ToDo\Data\ToDo\ToDoRow($this->row, $model);
}
}