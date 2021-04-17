<?php

namespace Drupal\sandwich\Plugin;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for sandwich plugins.
 */
abstract class SandwichPluginPluginBase extends PluginBase implements SandwichPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->pluginDefinition['description'];
  }

  /**
   * {@inheritdoc}
   */
  public function getCalories() {
    return $this->pluginDefinition['calories'];
  }

  /**
   * {@inheritdoc}
   */
  abstract public function order(array $extras);


}
