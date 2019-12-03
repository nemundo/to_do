<?php
namespace Nemundo\ToDo\Data\Comment;
class CommentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $comment;

protected function loadModel() {
$this->tableName = "todo_comment";
$this->aliasTableName = "todo_comment";
$this->label = "Comment";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "todo_comment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "todo_comment_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->comment->tableName = "todo_comment";
$this->comment->fieldName = "comment";
$this->comment->aliasFieldName = "todo_comment_comment";
$this->comment->label = "Comment";
$this->comment->allowNullValue = false;

}
}