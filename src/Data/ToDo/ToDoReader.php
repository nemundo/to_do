<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ToDoModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
}
/**
* @return ToDoRow[]
*/
public function getData() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return ToDoRow
*/
public function getRow() {
$this->addFieldByModel($this->model);
$this->checkExternal($this->model);
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ToDoRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ToDoRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}