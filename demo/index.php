<?php
/**
* @ignore
*/
define('IN_DEMO', true);
define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
require_once ROOT_PATH . 'bootstrap.php';

/* Create a new template view instance */
$template = new Demo\Views\Template();
$template->navigationItem('getting-started', array('#active' => true));

/* Append / set the child (contents) */
$page = new Demo\Views\Pages\GettingStarted();

/* Build the form ... */
$form = new Desai\Form\Views\Form();
$form->addChild( new \Desai\Form\Fields\Views\Field('Name', new Desai\Form\Fields\Views\Text('name') ) );
$form->addChild( new \Desai\Form\Fields\Views\Field('Email', new Desai\Form\Fields\Views\Email('email') ) );

// $form->addChild( new \Desai\Form\Fields\Views\Field('Is checked?', new Desai\Form\Fields\Views\Checkbox('my-checkbox')) );

$checkbox = new \Desai\Form\Fields\Views\Field('Is checked?', new Desai\Form\Fields\Views\Checkbox('my-checkbox'));
// $checkbox->field()->attr('checked', 'true');

$select = new \Desai\Form\Fields\Views\Select('my-select', array(
new \Desai\Form\Fields\Views\Option('You see', 'you-see'),
new \Desai\Form\Fields\Views\Option('this don\'t you?', 'dont-you')
));
$form->addChild( $checkbox );

$form->addChild( new \Desai\Form\Fields\Views\Field('My select box', $select) );


$form->addChild( new \Desai\Form\Fields\Views\Field('My Textarea', new \Desai\Form\Fields\Views\TextArea() ) );

$form->addChild( new \Desai\Form\Fields\Views\Field('', new Desai\Form\Fields\Views\Submit('submit', 'Send')) );


/* Add the form to the page view */
$page->set('form', $form);

/* Add the page view to the template view */
$template->content( $page );

/* Render the template */
print $template;