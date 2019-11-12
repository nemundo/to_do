<?php


namespace Nemundo\ToDo\Com;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Html\Formatting\Strike;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Site\DoneSite;
use Nemundo\User\Session\UserSession;

class ToDoTable extends AdminTable
{

    /**
     * @var bool
     */
    public $showDoneItem = false;

    public function getContent()
    {

        $toDoReader = new ToDoReader();
        $toDoReader->filter->andEqual($toDoReader->model->userId, (new UserSession())->userId);

        if (!$this->showDoneItem) {
            $toDoReader->filter->andEqual($toDoReader->model->done, false);
        }
        $toDoReader->addOrder($toDoReader->model->done);
        $toDoReader->addOrder($toDoReader->model->toDo);
        foreach ($toDoReader->getData() as $toDoRow) {

            $row = new TableRow($this);

            if ($toDoRow->done) {
                $strike = new Strike($row);
                $strike->content = $toDoRow->toDo;

                $row->addEmpty();

            } else {
                $row->addText($toDoRow->toDo);

                $site = clone(DoneSite::$site);
                $site->addParameter(new ToDoParameter($toDoRow->id));
                $row->addSite($site);

            }


        }

        return parent::getContent();

    }

}