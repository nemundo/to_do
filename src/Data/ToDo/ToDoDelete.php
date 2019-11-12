<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ToDoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
}