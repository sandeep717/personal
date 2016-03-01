<?php

/**
 * @file
 * Contains \Drupal\demo\Form\DemoForm.
 */

namespace Drupal\demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

class DemoForm extends FormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'kensium_contact_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['title'] = array(
            '#type' => 'textfield',
            '#title' => t('Title'),
            '#required' => TRUE,
        );
        $form['video'] = array(
            '#type' => 'textfield',
            '#title' => t('Youtube video url'),
        );
        $form['develop'] = array(
            '#type' => 'checkbox',
            '#title' => t('I would like to be involved in developing this material'),
        );
        $form['description'] = array(
            '#type' => 'textarea',
            '#title' => t('Description'),
        );
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => t('Submit'),
        );
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        // Validate video URL.
        if (!UrlHelper::isValid($form_state->getValue('video'), TRUE)) {
            $form_state->setErrorByName('video', $this->t("The video url '%url' is invalid.", array('%url' => $form_state->getValue('video'))));
        }
//        if(trim(($form_state->getValue('title'))) > 3){
//            $form_state->setErrorByName('title', $this->t("The title length should not be greater than 3.", array('%title' => $form_state->getValue('title'))));
//        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        // Display result.
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }
}
