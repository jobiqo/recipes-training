<?php

namespace Drupal\mymodule\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure mymodule settings for this site.
 */
class MymoduleSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mymodule_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['mymodule.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['article_highlight'] = array(
      '#type' => 'checkbox',
      '#title' => 'Artikel als Highlights ausgeben',
      '#default_value' => $this->config('mymodule.settings')->get('highlight'),
    );

    // Insert the form elements here!

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $this->config('mymodule.settings')
      ->set('highlight', $form_state->getValue('article_highlight'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
