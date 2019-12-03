<?php
namespace Nemundo\ToDo\Data\Comment;
class CommentDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
}