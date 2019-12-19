<?php


namespace Nemundo\ToDo\Workflow\Status;


use Nemundo\Process\Workflow\Content\Form\StatusForm;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;

class DoneProcessStatus extends AbstractProcessStatus
{

    protected function loadContentType()
    {
        $this->label = 'Done';
        $this->id = '6794c336-a173-4dbb-8f1c-2a1cbfd80eff';
        $this->formClass= StatusForm::class;
        $this->closeWorkflow=true;
        $this->changeStatus=true;
        // TODO: Implement loadStatus() method.
    }

}