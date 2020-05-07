<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ToDoLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
}