<?php

declare(strict_types=1);

/**
 * This file is part of the Micro framework package.
 *
 * (c) Stanislau Komar <head.trackingsoft@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Model\HelloWorld\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
#[ORM\Entity]
class QuoteEntity
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer', unique: true)]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    public function getId(): int|null
    {
        return $this->id;
    }
}
