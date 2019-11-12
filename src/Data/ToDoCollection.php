<?php
namespace Nemundo\ToDo\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ToDoCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\ToDo\Data\ToDo\ToDoModel());
}
}