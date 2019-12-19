<?php


namespace Nemundo\ToDo\Page;


use Nemundo\Admin\Template\AdminTemplate;
use Nemundo\ToDo\Com\ToDoTable;

class ToDoPage extends AdminTemplate
{

    public function getContent()
    {

        $table = new ToDoTable($this);
        $table->showDoneItem = true;

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}