<?php

use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\User\Session\UserSession;

require __DIR__ . '/../../../config.php';


(new \Nemundo\ToDo\Install\ToDoInstall())->install();


$todo= new \Nemundo\ToDo\Workflow\Process\ToDoProcess();
$todo->toDo = 'irgendwas';
$todo->saveType();




/*
$dataId = (new \Nemundo\Core\Random\UniqueId())->getUniqueId();
$todo = 'hello';

$data = new ToDo();
$data->id = $dataId;
$data->updateOnDuplicate = true;
$data->toDo = $todo;
//$data->workflowId = $this->dataId;
$data->userId = (new UserSession())->userId;
$data->save();

$writer = new \Nemundo\Process\Workflow\Content\Writer\WorkflowWriter();
$writer->dataId = $dataId;
$writer->contentType = new \Nemundo\ToDo\Workflow\Process\ToDoProcess();
$writer->subject = $todo;
$writer->write();*/



/*
$todo= new \Nemundo\ToDo\Workflow\Process\ToDoProcess();
$todo->toDo = 'irgendwas';
$todo->saveType();
*/

