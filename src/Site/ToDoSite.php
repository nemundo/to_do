<?php


namespace Nemundo\ToDo\Site;


use Nemundo\ToDo\Page\ToDoPage;
use Nemundo\Web\Site\AbstractSite;

class ToDoSite extends AbstractSite
{

    /**
     * @var ToDoSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->url = 'todo';
        $this->menuActive = false;

        ToDoSite::$site = $this;

        new DoneSite($this);

    }

    public function loadContent()
    {
        (new ToDoPage())->render();
    }

}