<?php

namespace JMS\TranslationBundle\Annotation;

use JMS\TranslationBundle\Exception\RuntimeException;

/**
 * @Annotation
 * @Target("ALL")
 *
 * Custom annotation used for handling PHP alternative french description
 */
final class DescFr
{
    /** @var string @Required */
    public $text;

    public function __construct()
    {
        if (0 === func_num_args()) {
            return;
        }
        $values = func_get_arg(0);

        if (isset($values['value'])) {
            $values['text'] = $values['value'];
        }

        if (!isset($values['text'])) {
            throw new RuntimeException(sprintf('The "text" attribute for annotation "@DescFr" must be set.'));
        }

        $this->text = $values['text'];
    }
}