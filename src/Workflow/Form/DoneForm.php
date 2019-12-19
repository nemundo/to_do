<?php


namespace Nemundo\ToDo\Workflow\Form;


use Nemundo\Process\Workflow\Content\Form\AbstractStatusForm;
use Nemundo\ToDo\Workflow\Item\DoneItem;

class DoneForm extends AbstractStatusForm
{

    protected function onSubmit()
    {

        $item = new DoneItem();
        $item->parentId=$this->parentId;
        $item->saveItem();

        // TODO: Implement onSubmit() method.
    }

}