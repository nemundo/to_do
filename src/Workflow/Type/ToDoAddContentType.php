<?php


namespace Nemundo\ToDo\Workflow\Type;


use Nemundo\Process\Content\Type\AbstractContentType;
use Nemundo\ToDo\Workflow\Form\ToDoAddContentForm;

class ToDoAddContentType extends AbstractContentType
{

    protected function loadContentType()
    {
        $this->contentLabel='Add Existing To Do';
   $this->contentId='5ee48631-96a0-473a-9c66-b9dad8e4ba99';
   $this->formClass=ToDoAddContentForm::class;
    }

}