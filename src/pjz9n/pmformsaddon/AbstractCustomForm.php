<?php

/**
 * Copyright (c) 2020 PJZ9n.
 *
 * This file is part of pmforms-addon.
 *
 * pmforms-addon is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * pmforms-addon is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with pmforms-addon. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace pjz9n\pmformsaddon;

use Closure;
use dktapps\pmforms\CustomForm;
use dktapps\pmforms\CustomFormResponse;
use pocketmine\player\Player;

abstract class AbstractCustomForm extends CustomForm
{
    public function __construct(string $title, array $elements)
    {
        parent::__construct(
            $title,
            $elements,
            Closure::fromCallable([$this, "onSubmit"]),
            Closure::fromCallable([$this, "onClose"])
        );
    }

    public function onClose(Player $player): void
    {
        //
    }

    abstract public function onSubmit(Player $player, CustomFormResponse $response): void;
}
