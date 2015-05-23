<?php
/**
 * Particle.
 *
 * @link      http://github.com/particle-php for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Particle (http://particle-php.com)
 * @license   https://github.com/particle-php/Filter/blob/master/LICENSE New BSD License
 */
namespace Particle\Filter;

/**
 * Class Chain
 *
 * @package Particle\Filter
 */
class Chain
{
    /**
     * @var Rule[]
     */
    protected $rules;

    /**
     * Add the trim rule to the chain
     *
     * @param string|null $characters
     * @return $this
     */
    public function trim($characters = null)
    {
        return $this->addRule(new \Particle\Filter\Rule\Trim($characters));
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function filter($value)
    {
        /** @var Rule $rule */
        foreach ($this->rules as $rule) {
            $value = $rule->filter($value);
        }

        return $value;
    }

    /**
     * Add a new rule to the chain
     *
     * @param Rule $rule
     * @return $this
     */
    protected function addRule(Rule $rule)
    {
        $this->rules[] = $rule;

        return $this;
    }
}
