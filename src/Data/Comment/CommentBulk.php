<?php
namespace Nemundo\ToDo\Data\Comment;
class CommentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var CommentModel
*/
protected $model;

/**
* @var string
*/
public $comment;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
$id = parent::save();
return $id;
}
}