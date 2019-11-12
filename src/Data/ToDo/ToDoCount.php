<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ToDoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
}