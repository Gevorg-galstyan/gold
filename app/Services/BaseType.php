<?php

namespace App\Services;

use Illuminate\Http\Request;

abstract class BaseType
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var
     */
    protected $slug;

    /**
     * @var
     */
    protected $files;

    /**
     * @var
     */
    protected $options;

    /**
     * @var
     */
    protected $path;

    /**
     * Password constructor.
     *
     * @param Request $request
     * @param $slug
     * @param $row
     */
    public function __construct(Request $request, $slug, $files, $options, $path = '')
    {
        $this->request = $request;
        $this->slug = $slug;
        $this->files = $files;
        $this->options = $options;
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    abstract public function handle();
}
