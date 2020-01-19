<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{

	protected function createComponentLetterForm(): UI\Form
	{
		$form = new UI\Form;
		$form->setHtmlAttribute('class', 'ajax');

		$form->addText('subject', 'Subject:')
			->setRequired('Subject must be filled');
		$form->addTextArea('text', 'Text:')
			->setRequired('Please write something');
		$form->addSubmit('send', 'Send');

		$form->onSuccess[] = [$this, 'letterFormSucceeded'];
		$form->onError[] = [$this, 'letterFormFailed'];

		return $form;
	}

	public function letterFormSucceeded(UI\Form $form, \stdClass $values): void
	{
		// TODO send letter

		$this->flashMessage('Letter sent successfully');

		if ($this->isAjax()) {
			$this->redrawControl();
		} else {
			$this->redirect('this');
		}
	}

	public function letterFormFailed(UI\Form $form): void
	{
		if ($this->isAjax()) {
			$this->redrawControl('letterForm');
		}
	}

}
