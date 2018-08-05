<?php

namespace SilenceDis\MultiSourceMapper\ConfigInterpreter\Expression;

use SilenceDis\MultiSourceMapper\ConfigInterpreter\InterpreterContext\InterpreterContextInterface;

/**
 * Represents a simple array, each value of which should be interpreted.
 *
 * @author Yurii Slobodeniuk <silencedis@gmail.com>
 */
class PlainArrayExpression extends AbstractExpression
{
    private $expressionValue;
    
    public function __construct(array $array)
    {
        $this->expressionValue = $array;
    }
    
    public function interpret(InterpreterContextInterface $context)
    {
        $interpretedArray = [];
        
        foreach ($this->expressionValue as $key => $expression) {
            $expression->interpret($context);
            $interpretedArray[$key] = $context->lookup($expression);
        }
        
        $context->replace($this, $interpretedArray);
    }
}