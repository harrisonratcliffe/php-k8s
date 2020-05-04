<?php

namespace RenokiCo\PhpK8s\Kinds;

use RenokiCo\PhpK8s\Contracts\InteractsWithK8sCluster;
use RenokiCo\PhpK8s\Traits\HasAnnotations;
use RenokiCo\PhpK8s\Traits\HasLabels;
use RenokiCo\PhpK8s\Traits\HasName;

class K8sConfigMap extends K8sResource implements InteractsWithK8sCluster
{
    use HasAnnotations, HasLabels, HasName;

    /**
     * The resource Kind parameter.
     *
     * @var null|string
     */
    protected static $kind = 'ConfigMap';

    /**
     * Wether the resource has a namespace.
     *
     * @var bool
     */
    protected static $hasNamespace = true;

    /**
     * Get the data attribute.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->getAttribute('data');
    }

    /**
     * Set the data attribute.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData(array $data)
    {
        return $this->setAttribute('data', $data);
    }

    /**
     * Add a new key-value pair to the data.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return $this
     */
    public function addData($name, $value)
    {
        return $this->setAttribute("data.{$name}", $value);
    }

    /**
     * Remove a key from the data attribute.
     *
     * @param  string  $name
     * @return $this
     */
    public function removeData($name)
    {
        return $this->removeAttribute("data.{$name}");
    }

    /**
     * Get the path, prefixed by '/', to point to the resource list.
     *
     * @return string
     */
    public function resourcesApiPath(): string
    {
        return "/api/{$this->getApiVersion()}/namespaces/{$this->getNamespace()}/configmaps";
    }

    /**
     * Get the path, prefixed by '/', that points to the specific resource.
     *
     * @return string
     */
    public function resourceApiPath(): string
    {
        return "/api/{$this->getApiVersion()}/namespaces/{$this->getNamespace()}/configmaps/{$this->getIdentifier()}";
    }
}
