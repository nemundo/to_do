<?php
namespace Nemundo\ToDo\Data\Comment;
class CommentCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
}