<?php
/**
  *@file
  * Contains \Drupal\feedback\Form\feedbackForm
	*/
namespace Drupal\feedback\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class feedbackForm extends FormBase {
	public function getFormId() {
		return 'feedback_form';
	}
	/**
		*@file
		* Building Form Feedback
		*/ 
	public function buildForm(array $form, FormStateInterface $form_state) {
		
		$form['name'] = array(
      '#title' => t('Full Name'),
      '#type' => 'textfield',
      '#size' => 25,
      '#description' => t('Enter Full Name'),
      '#required' => TRUE,
		);
		$option1 = array(
			'Very Satisfied' => t('Very Satisfied'),
			'Satisfied' => t('Satisfied '), 
      'Neither Satisfied or Dissatisfied' => t('Neither Satisfied or Dissatisfied'),
      'Dissatisfied ' => t('Dissatisfied '),
      'Very Dissatisfied ' => t('Very Dissatisfied '),
		);
		$form['feedback'] = array(
			'#type' => 'radios',
			'#title' => $this->t('Feedback Form'),
			'#description' => t('How was your experience on our site'),
			'#options' => $option1,						
 		);
 		$form['submit'] = array(
 			'#type' => 'submit',
 			'#value' => t('Submit Feedback'),
    );
 		$form['nid'] = array(
      '#type' => 'hidden',
      '#value' => $nid,
 		);
 		return $form;
	}
  /**
		*@file
		* Pushing data entered into database
		*/ 
  public function submitForm(array &$form, FormStateInterface $form_state) {
    db_insert('feedback')
      ->fields(array(
        'name' => $form_state->getValue('name'),
        'rating' => $form_state->getValue('feedback'),        
      ))
      ->execute();
  }
}