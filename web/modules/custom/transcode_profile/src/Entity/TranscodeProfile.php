<?php

namespace Drupal\transcode_profile\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\transcode_profile\TranscodeProfileInterface;

/**
 * Defines the transcode profile entity type.
 *
 * @ConfigEntityType(
 *   id = "transcode_profile",
 *   label = @Translation("Transcode Profile"),
 *   label_collection = @Translation("Transcode Profiles"),
 *   label_singular = @Translation("Transcode profile"),
 *   label_plural = @Translation("Transcode profiles"),
 *   label_count = @PluralTranslation(
 *     singular = "@count Transcode profile",
 *     plural = "@count Transcode profiles",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\transcode_profile\TranscodeProfileListBuilder",
 *     "form" = {
 *       "add" = "Drupal\transcode_profile\Form\TranscodeProfileForm",
 *       "edit" = "Drupal\transcode_profile\Form\TranscodeProfileForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "transcode_profile",
 *   admin_permission = "administer transcode_profile",
 *   links = {
 *     "collection" = "/admin/structure/transcode-profile",
 *     "add-form" = "/admin/structure/transcode-profile/add",
 *     "edit-form" = "/admin/structure/transcode-profile/{transcode_profile}",
 *     "delete-form" = "/admin/structure/transcode-profile/{transcode_profile}/delete"
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *     "codec" = "codec"
 *   }
 * )
 */
class TranscodeProfile extends ConfigEntityBase implements TranscodeProfileInterface {

  /**
   * The Transcode profile ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Transcode profile label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Transcode profile status.
   *
   * @var bool
   */
  protected $status;

  /**
   * The Transcode profile description.
   *
   * @var string
   */
  protected $description;

  /**
   * The Transcode profile coded.
   *
   * @var string
   */
  protected $codec;

  public function getCodec() {
    return $this->codec;
  }

}
