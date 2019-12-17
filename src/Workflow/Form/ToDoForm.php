<?php


namespace Nemundo\ToDo\Workflow\Form;



use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Process\Form\AbstractStatusForm;
use Nemundo\Process\Parameter\WorkflowParameter;
use Nemundo\ToDo\Data\ToDo\ToDo;
use Nemundo\ToDo\Data\ToDo\ToDoReader;
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

    /*    $p = new Paragraph($this);
        $p->content ='dataid:'. $this->dataId;

        $p = new Paragraph($this);
        $p->content ='parentid:'. $this->parentId;*/

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {



        $reader = new ToDoReader();
        $reader->model->loadWorkflow();
        $reader->filter->andEqual($reader->model->workflowId, $this->dataId);
        $todoRow = $reader->getRow();

        $this->todo->value= $todoRow->workflow->subject;



    }


    protected function onSubmit()
    {

        $builder = new ToDoBuilder($this->dataId);
        $builder->parentId=$this->parentId;
        $builder->toDo = $this->todo->getValue();
        $builder->saveItem();

        $this->redirectSite->addParameter(new WorkflowParameter($builder->dataId));



    }


}