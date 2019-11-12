<?php


namespace Nemundo\ToDo\Com;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\User\Session\UserSession;

class ToDoForm extends BootstrapForm
{

    /**
     * @var BootstrapTextBox
     */
    private $todo;


    public function getContent()
    {

        $this->todo = new BootstrapTextBox($this);
        $this->todo->label = 'To Do';
        $this->todo->validation=true;

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $data = new ToDo();
        $data->userId = (new UserSession())->userId;
        $data->toDo = $this->todo->getValue();
        $data->save();

    }


}