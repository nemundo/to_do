<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ToDoLogModel
*/
protected $model;

/**
* @var string
*/
public $toDoId;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->toDoId, $this->toDoId);
$id = parent::save();
return $id;
}
}