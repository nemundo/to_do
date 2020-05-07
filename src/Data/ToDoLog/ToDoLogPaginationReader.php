<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ToDoLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoLogModel();
}
/**
* @return ToDoLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ToDoLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}