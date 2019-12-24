<?php


namespace Nemundo\ToDo\Content;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Formatting\Strike;
use Nemundo\Process\Content\View\AbstractContentList;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Site\DoneSite;

class ToDoContentList extends AbstractContentList
{
    public function getContent()
    {




        $toDoReader = new ToDoReader();
        $toDoReader->model->loadWorkflow();
        $toDoReader->model->workflow->loadProcess();
        $toDoReader->model->workflow->process->loadContentType();

        /*
        $toDoReader->filter->andEqual($toDoReader->model->userId, (new UserSession())->userId);

        if (!$this->showDoneItem) {
            $toDoReader->filter->andEqual($toDoReader->model->done, false);
        }
        $toDoReader->addOrder($toDoReader->model->done);
        $toDoReader->addOrder($toDoReader->model->toDo);*/

        $table = new AdminClickableTable($this);

        foreach ($toDoReader->getData() as $toDoRow) {

            $row = new TableRow($table);

            $row->addText($toDoRow->workflow->subject);
            $row->addText($toDoRow->workflow->workflowNumber);


            $row->addText($toDoRow->workflow->getSubject());

            //$row->addSite($toDoRow->workflow->getViewSite());

            /*

            if ($toDoRow->done) {
                $strike = new Strike($row);
                $strike->content = $toDoRow->toDo;

                $row->addEmpty();

            } else {

                $site = clone(DoneSite::$site);
                $site->addParameter(new ToDoParameter($toDoRow->id));
                $row->addSite($site);

            }*/

        }


            return parent::getContent(); // TODO: Change the autogenerated stub
    }

}