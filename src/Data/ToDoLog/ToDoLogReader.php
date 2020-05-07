<?php
namespace Nemundo\ToDo\Data\ToDoLog;
class ToDoLogReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ToDoLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ToDoLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ToDoLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}