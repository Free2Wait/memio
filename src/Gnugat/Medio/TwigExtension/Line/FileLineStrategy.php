<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\TwigExtension\Line;

use Gnugat\Medio\Exception\InvalidArgumentException;
use Gnugat\Medio\Model\File;

class FileLineStrategy implements LineStrategy
{
    /**
     * {@inheritDoc}
     */
    public function supports($model)
    {
        return $model instanceof File;
    }

    /**
     * {@inheritDoc}
     */
    public function needsLineAfter($model, $block)
    {
        $fullyQualifiedNames = $model->allFullyQualifiedNames();
        if ('fully_qualified_names' === $block) {
            return (!empty($fullyQualifiedNames));
        }

        throw new InvalidArgumentException('The function needs_line_after does not support given "'.$block.'"');
    }
}
