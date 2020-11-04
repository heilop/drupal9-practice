<?php

namespace Drupal\transcode_profile;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface defining a Transcode profile entity type.
 */
interface TranscodeProfileInterface extends ConfigEntityInterface {
  public function  getCodec();
}
