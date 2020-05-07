<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ToDoLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
}