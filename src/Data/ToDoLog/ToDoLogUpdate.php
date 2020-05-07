<?php
namespace Nemundo\ToDo\Data\ToDoLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class ToDoLogUpdate extends AbstractModelUpdate {
/**
* @var ToDoLogModel
*/
public $model;

/**
* @var string
*/
public $toDoId;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->toDoId, $this->toDoId);
parent::update();
}
}