<?php

namespace Drupal\transcode_profile\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Configure Transcode Profile settings for this site.
 */
class AdminSettingsForm extends ConfigFormBase {

  /**
   * The config Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface;
   */
  protected $configFactory;

  /**
   * The  entity type Manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager;
   */
  protected $entityTypeManager;

  /**
   * AdminSettingsForm constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   * @param \Drupal\Core\Entity\EntityTypeManager $entity_type_manager
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManager $entity_type_manager) {
    parent::__construct($config_factory);
    $this->configFactory = $config_factory;
    $this->entityTypeManager = $entity_type_manager;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager')
    );
  }

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
    $transcode_profiles = $this->entityTypeManager->getStorage('transcode_profile')->loadMultiple();
    $dropdown_array = [];
    foreach($transcode_profiles as $profile) {
      $key = $profile->id();
      $value = $profile->label();
      $dropdown_array[$key] = $value;
    }

    $form['profile_name'] = [
      '#type' => 'select',
      '#title' => $this->t('Profile Name'),
      '#description' => $this->t('Video Transcode Profile Name'),
      '#default_value' => $this->config('transcode_profile.settings')->get('profile_id'),
      '#options' => $dropdown_array,
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
      ->set('profile_id', $form_state->getValue('profile_name'))
      ->set('enable_transcoding', $form_state->getValue('enable_transcoding'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
