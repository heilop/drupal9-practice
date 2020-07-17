<?php

namespace Drupal\transcode_profile\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Transcode Profile settings for this site.
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'transcode_profile_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['transcode_profile.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['profile_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Profile Name'),
      '#description' => $this->t('Video Transcode Profile Name'),
      '#default_value' => $this->config('transcode_profile.settings')->get('profile_name'),
    ];
    $form['enable_transcoding'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable Transcoding'),
      '#description' => $this->t('Enable Video Transcoding'),
      '#default_value' => $this->config('transcode_profile.settings')->get('enable_transcoding'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('transcode_profile.settings')
      ->set('profile_name', $form_state->getValue('profile_name'))
      ->set('enable_transcoding', $form_state->getValue('enable_transcoding'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
