<?php

namespace Asv1979\Otus3;

use ValueError;

/**
 *
 */
class FileReceiver
{
    /**
     * @var string $file a path with a file name
     */
    private $file;

    /**
     * Set path to a file
     *
     * @param string $file
     */
    public function __construct(string $file) {
        if (empty($file)) {
            throw new ValueError;
        }
        $this->file = $file;
    }


    /**
     * @return string
     * @throws FileNotFoundException
     */
    public function getContext(){
        if (!file_exists($this->file) || !is_file($this->file)) {
            throw new FileNotFoundException($this->file . 'is not exist');
        }

        $content = file_get_contents($this->file);

        if (empty($content)) {
            throw new ValueError;
        }

        return $content;
    }
}
