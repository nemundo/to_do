<?php
namespace Nemundo\ToDo\Data\ToDo;
use Nemundo\Model\Data\AbstractModelUpdate;
class ToDoUpdate extends AbstractModelUpdate {
/**
* @var ToDoModel
*/
public $model;

/**
* @var bool
*/
public $active;

/**
* @var int
*/
public $number;

/**
* @var string
*/
public $workflowNumber;

/**
* @var string
*/
public $subject;

/**
* @var bool
*/
public $workflowClosed;

/**
* @var string
*/
public $statusId;

/**
* @var \Nemundo\Core\Type\DateTime\Date
*/
public $deadline;

/**
* @var string
*/
public $assignmentId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $toDo;

/**
* @var bool
*/
public $done;

public function __construct() {
parent::__construct();
$this->model = new ToDoModel();
$this->deadline = new \Nemundo\Core\Type\DateTime\Date();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->number, $this->number);
$this->typeValueList->setModelValue($this->model->workflowNumber, $this->workflowNumber);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->workflowClosed, $this->workflowClosed);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateDataProperty($this->model->deadline, $this->typeValueList);
$property->setValue($this->deadline);
$this->typeValueList->setModelValue($this->model->assignmentId, $this->assignmentId);
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->toDo, $this->toDo);
$this->typeValueList->setModelValue($this->model->done, $this->done);
parent::update();
}
}