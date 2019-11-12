<?php


namespace Nemundo\ToDo\Site;


use Nemundo\ToDo\Data\ToDo\ToDoUpdate;
use Nemundo\ToDo\Parameter\ToDoParameter;
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

        $update = new ToDoUpdate();
        $update->done = true;
        $update->updateById((new ToDoParameter())->getValue());

        (new UrlReferer())->redirect();

    }

}