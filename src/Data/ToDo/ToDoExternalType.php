<?php
namespace Nemundo\ToDo\Data\ToDo;
class ToDoExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $number;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $workflowNumber;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $workflowClosed;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $statusId;

/**
* @var \Nemundo\Process\Content\Data\Content\ContentExternalType
*/
public $status;

/**
* @var \Nemundo\Model\Type\DateTime\DateType
*/
public $deadline;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $assignmentId;

/**
* @var \Nemundo\Process\Group\Data\Group\GroupExternalType
*/
public $assignment;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Process\Content\Data\ContentType\ContentTypeExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $toDo;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $done;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ToDoModel::class;
$this->externalTableName = "todo_todo";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->number = new \Nemundo\Model\Type\Number\NumberType();
$this->number->fieldName = "number";
$this->number->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->number->aliasFieldName = $this->number->tableName . "_" . $this->number->fieldName;
$this->number->label = "Number";
$this->addType($this->number);

$this->workflowNumber = new \Nemundo\Model\Type\Text\TextType();
$this->workflowNumber->fieldName = "workflow_number";
$this->workflowNumber->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowNumber->aliasFieldName = $this->workflowNumber->tableName . "_" . $this->workflowNumber->fieldName;
$this->workflowNumber->label = "Workflow Number";
$this->addType($this->workflowNumber);

$this->subject = new \Nemundo\Model\Type\Text\TextType();
$this->subject->fieldName = "subject";
$this->subject->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->subject->aliasFieldName = $this->subject->tableName . "_" . $this->subject->fieldName;
$this->subject->label = "Subject";
$this->addType($this->subject);

$this->workflowClosed = new \Nemundo\Model\Type\Number\YesNoType();
$this->workflowClosed->fieldName = "workflow_closed";
$this->workflowClosed->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowClosed->aliasFieldName = $this->workflowClosed->tableName . "_" . $this->workflowClosed->fieldName;
$this->workflowClosed->label = "Workflow Closed";
$this->addType($this->workflowClosed);

$this->statusId = new \Nemundo\Model\Type\Id\IdType();
$this->statusId->fieldName = "status";
$this->statusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusId->aliasFieldName = $this->statusId->tableName ."_".$this->statusId->fieldName;
$this->statusId->label = "Status";
$this->addType($this->statusId);

$this->deadline = new \Nemundo\Model\Type\DateTime\DateType();
$this->deadline->fieldName = "deadline";
$this->deadline->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->deadline->aliasFieldName = $this->deadline->tableName . "_" . $this->deadline->fieldName;
$this->deadline->label = "Deadline";
$this->addType($this->deadline);

$this->assignmentId = new \Nemundo\Model\Type\Id\IdType();
$this->assignmentId->fieldName = "assignment";
$this->assignmentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->assignmentId->aliasFieldName = $this->assignmentId->tableName ."_".$this->assignmentId->fieldName;
$this->assignmentId->label = "Assignment";
$this->addType($this->assignmentId);

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date/Time";
$this->addType($this->dateTime);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->toDo = new \Nemundo\Model\Type\Text\TextType();
$this->toDo->fieldName = "to_do";
$this->toDo->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->toDo->aliasFieldName = $this->toDo->tableName . "_" . $this->toDo->fieldName;
$this->toDo->label = "To Do";
$this->addType($this->toDo);

$this->done = new \Nemundo\Model\Type\Number\YesNoType();
$this->done->fieldName = "done";
$this->done->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->done->aliasFieldName = $this->done->tableName . "_" . $this->done->fieldName;
$this->done->label = "Done";
$this->addType($this->done);

}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\Process\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_status");
$this->status->fieldName = "status";
$this->status->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->status->aliasFieldName = $this->status->tableName ."_".$this->status->fieldName;
$this->status->label = "Status";
$this->addType($this->status);
}
return $this;
}
public function loadAssignment() {
if ($this->assignment == null) {
$this->assignment = new \Nemundo\Process\Group\Data\Group\GroupExternalType(null, $this->parentFieldName . "_assignment");
$this->assignment->fieldName = "assignment";
$this->assignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->assignment->aliasFieldName = $this->assignment->tableName ."_".$this->assignment->fieldName;
$this->assignment->label = "Assignment";
$this->addType($this->assignment);
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Process\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
}