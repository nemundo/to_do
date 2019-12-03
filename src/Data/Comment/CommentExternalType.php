<?php
namespace Nemundo\ToDo\Data\Comment;
class CommentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $comment;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CommentModel::class;
$this->externalTableName = "todo_comment";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType();
$this->comment->fieldName = "comment";
$this->comment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->comment->aliasFieldName = $this->comment->tableName . "_" . $this->comment->fieldName;
$this->comment->label = "Comment";
$this->addType($this->comment);

}
}