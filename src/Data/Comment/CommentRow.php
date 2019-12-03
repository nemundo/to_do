<?php
namespace Nemundo\ToDo\Data\Comment;
class CommentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CommentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $comment;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->comment = $this->getModelValue($model->comment);
}
}