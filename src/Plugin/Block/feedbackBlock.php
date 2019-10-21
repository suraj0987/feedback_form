<?php
/**
  *@file
  * Contains \Drupal\feedback\Plugin\Block\feedbackBlock
  */
namespace Drupal\feedback\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
  * Provides a 'Feedback' List Block
  * @Block(
  *   id = "feedback_block",
  *   admin_lael = @Translation("Feedback Block"),
  *   )
  */
  class feedbackBlock extends BlockBase {
    
    public funtion build() {
      return \Drupal::formBuilder()->getForm('Drupal\feedback\Form\feedbackForm');
    }
  }