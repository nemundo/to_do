<?php
namespace Nemundo\ToDo\Data\ToDo;
use Nemundo\Model\Data\AbstractModelUpdate;
class ToDoUpdate extends AbstractModelUpdate {
/**
* @var ToDoModel
*/
public $model;

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
public $userId;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}