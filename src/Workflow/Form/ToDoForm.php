<?php


namespace Nemundo\ToDo\Workflow\Form;



use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Process\Form\AbstractStatusForm;
use Nemundo\Process\Parameter\WorkflowParameter;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Workflow\Builder\ToDoBuilder;
use Nemundo\User\Session\UserSession;

class ToDoForm extends AbstractStatusForm
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


    protected function onSave()
    {

        $builder = new ToDoBuilder();
        $builder->toDo = $this->todo->getValue();
        $builder->createWorkflow();

        $this->redirectSite->addParameter(new WorkflowParameter($builder->workflowId));



    }


}