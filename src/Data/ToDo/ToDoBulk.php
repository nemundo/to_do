<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}