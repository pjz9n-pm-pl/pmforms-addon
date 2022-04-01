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
use dktapps\pmforms\ModalForm;
use pocketmine\player\Player;

abstract class AbstractModalForm extends ModalForm
{
    public function __construct(string $title, string $text, string $yesButtonText = "gui.yes", string $noButtonText = "gui.no")
    {
        parent::__construct(
            $title,
            $text,
            Closure::fromCallable([$this, "onSubmit"]),
            $yesButtonText,
            $noButtonText
        );
    }

    abstract public function onSubmit(Player $player, bool $choice): void;
}
