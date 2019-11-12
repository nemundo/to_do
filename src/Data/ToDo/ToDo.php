<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDo extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ToDoModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}