<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ToDoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
}