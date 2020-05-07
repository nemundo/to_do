<?php
namespace Nemundo\ToDo\Data\ToDoLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class ToDoLogId extends AbstractModelIdValue {
/**
* @var ToDoLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
}