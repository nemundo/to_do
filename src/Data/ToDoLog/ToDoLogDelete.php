<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ToDoLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
}