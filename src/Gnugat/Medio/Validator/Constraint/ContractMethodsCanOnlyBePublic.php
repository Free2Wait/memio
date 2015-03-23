<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Medio\Validator\Constraint;

use Gnugat\Medio\Validator\Constraint;
use Gnugat\Medio\Validator\Violation\NoneViolation;
use Gnugat\Medio\Validator\Violation\SomeViolation;

class ContractMethodsCanOnlyBePublic implements Constraint
{
    /**
     * {@inheritDoc}
     */
    public function validate($model)
    {
        $contractName = $model->getName();
        $messages = array();
        foreach ($model->allMethods() as $method) {
            $visibility = $method->getVisibility();
            if ('' !== $visibility && 'public' !== $visibility) {
                $messages[] = sprintf('Contract "%s" Method "%s" can only be public', $contractName, $method->getName());
            }
        }

        return (empty($messages) ? new NoneViolation() : new SomeViolation(implode("\n", $messages)));
    }
}
