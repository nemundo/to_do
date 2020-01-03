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
public $id;

/**
* @var string
*/
public $toDo;

/**
* @var bool
*/
public $done;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$id = parent::save();
return $id;
}
}