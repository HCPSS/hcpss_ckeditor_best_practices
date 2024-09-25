<?php

declare(strict_types=1);

namespace Drupal\hcpss_ckeditor_best_practices\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for HCPSS CKEditor Best Practices routes.
 */
final class HcpssCkeditorBestPracticesController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke(): array {
    $build['intro'] = [
      '#type' => 'item',
      '#markup' => '
        <p>The truth is, <strong>users don’t <em>read</em> Web pages; they scan
        them</strong>, looking for things they can read very quickly until they
        find a relevant piece of information.</p>

        <p>What does this mean? Write pages the way people use them. Make them
        <strong>scannable.</strong></p>
      ',
    ];

    $build['organize'] = ['#type' => 'container'];
    $build['organize']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Organize Content in an Inverted Pyramid',
      '#attributes' => [
        'id' => 'organize',
      ]
    ];
    $build['organize']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Organize your content as an inverted pyramid; put the most important
        information at the top and less important information at the bottom.
      ',
    ];

    $build['headers'] = ['#type' => 'container'];
    $build['headers']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Add Headings',
      '#attributes' => [
        'id' => 'headers',
      ]
    ];
    $build['headers']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Look for opportunities to divide your content into sections and give
        each section a descriptive heading.
      ',
    ];

    $build['concise'] = ['#type' => 'container'];
    $build['concise']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Write Concisely',
      '#attributes' => [
        'id' => 'concise',
      ]
    ];
    $build['concise']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Keep your paragraphs short—no more than 3-4 lines of text. Look for
        opportunities to cut words, sentences, and even entire paragraphs if
        they do not contribute necessary content.
      ',
    ];

    $build['active'] = ['#type' => 'container'];
    $build['active']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Write actively, not passively',
      '#attributes' => [
        'id' => 'active',
      ]
    ];
    $build['active']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Always write using active voice. For example, say “we mailed your form”
        not “your form was mailed.”
      ',
    ];

    $build['lists'] = ['#type' => 'container'];
    $build['lists']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Use Bulleted and Numbered Lists',
      '#attributes' => [
        'id' => 'lists',
      ]
    ];
    $build['lists']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Use bulleted or numbered lists when appropriate.',
    ];

    $build['bold'] = ['#type' => 'container'];
    $build['bold']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Link and Bold Important Pieces of Information',
      '#attributes' => [
        'id' => 'bold',
      ]
    ];
    $build['bold']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Use hyperlinks and bolding to highlight important pieces of content, but
        be judicious—less is more.
      ',
    ];

    $build['link'] = ['#type' => 'container'];
    $build['link']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Link Meaningful Words',
      '#attributes' => [
        'id' => 'link',
      ]
    ];
    $build['link']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        When you do hyperlink content, make sure you link phrases that convey
        information about the destination Web page or file. Do not use “click
        here”—it conveys no information and is problematic for individuals using
        screen readers and other assistive technologies.
      ',
    ];

    $build['word'] = ['#type' => 'container'];
    $build['word']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Do Not Link to Office Documents',
      '#attributes' => [
        'id' => 'word',
      ]
    ];
    $build['word']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Office documents are generally not accessible for people with
        disabilities. It\'s better to create a new webpage with the content of
        the office document.
        <a href="https://www.colorado.edu/digital-accessibility/resources/understanding-word-accessibility" target="_blank">More
        information about accessible Microsoft Word documents.</a>
        <a href="https://support.google.com/docs/answer/6199477?hl=en" target="_blank">More
        information about making Google documents accessible.</a>
      ',
    ];

    $build['jargon'] = ['#type' => 'container'];
    $build['jargon']['head'] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Avoid acronyms and jargon',
      '#attributes' => [
        'id' => 'jargon',
      ]
    ];
    $build['jargon']['content'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => '
        Don’t use acronyms and jargon. If you must use acronyms, spell out the
        words the first time you them on every Web page.
      ',
    ];

    return $build;
  }
}
