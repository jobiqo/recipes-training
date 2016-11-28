<?php

namespace Drupal\recipes\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure recipes settings for this site.
 */
class RecipesSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'recipes_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['recipes.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('recipes.settings');
    $form['show_message'] = array(
      '#type' => 'checkbox',
      '#title' => $this->t('Show message on recipes'),
      '#default_value' => $config->get('show_message'),
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('recipes.settings')
      ->set('show_message', $form_state->getValue('show_message'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
