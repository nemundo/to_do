<?php


namespace Nemundo\ToDo\Site;


use Nemundo\ToDo\Data\ToDo\ToDoReader;
use Nemundo\ToDo\Parameter\ToDoParameter;
use Nemundo\ToDo\Workflow\Item\DoneItem;
use Nemundo\ToDo\Workflow\Process\ToDoProcess;
use Nemundo\ToDo\Workflow\Status\DoneProcessStatus;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Url\UrlReferer;

class DoneSite extends AbstractSite
{

    /**
     * @var DoneSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Done';
        $this->url = 'done';
        $this->menuActive = false;

        DoneSite::$site = $this;

    }

    public function loadContent()
    {


        $todoId = (new ToDoParameter())->getValue();
        $todoType = new ToDoProcess($todoId);
        $todoRow =$todoType->getDataRow();

        $item = new DoneProcessStatus();
        $item->parentId = $todoRow->workflow->id;
        $item->saveType();

        /*
        $update = new ToDoUpdate();
        $update->done = true;
        $update->updateById((new ToDoParameter())->getValue());*/

        (new UrlReferer())->redirect();

    }

}