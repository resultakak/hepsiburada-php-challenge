<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Nasa\Command;

/**
 * Interface CommandCollectionInterface
 *
 * @category CommandCollectionInterface
 * @package  Api\Nasa\Command
 */
interface CommandCollectionInterface
{
    /**
     * @return array
     */
    public function getCommands(): array;
}
