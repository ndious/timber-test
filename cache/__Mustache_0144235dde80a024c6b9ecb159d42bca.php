<?php

class __Mustache_0144235dde80a024c6b9ecb159d42bca extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<div>';
        $value = $this->resolveValue($context->find('message'), $context);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</div>
';
        $buffer .= $indent . '<pre>';
        $value = $this->resolveValue($context->find('stack'), $context);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= '</pre>';

        return $buffer;
    }
}
