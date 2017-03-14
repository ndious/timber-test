<?php

class __Mustache_7dfe63fd80e05fa8ae380b35c59771ad extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        // 'user' section
        $value = $context->find('user');
        $buffer .= $this->sectionF9858afed036a32d6dbf39431e05fdcd($context, $indent, $value);
        // 'user' inverted section
        $value = $context->find('user');
        if (empty($value)) {
            
            $buffer .= $indent . '  <form method="post" action="/user/auth">
';
            $buffer .= $indent . '    <input type="text" name="username" placeholder="Username">
';
            $buffer .= $indent . '    <button type="submit">Submit</button>
';
            $buffer .= $indent . '  </form>
';
        }

        return $buffer;
    }

    private function sectionF9858afed036a32d6dbf39431e05fdcd(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
  <b>Hello {{username}}!</b>
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '  <b>Hello ';
                $value = $this->resolveValue($context->find('username'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '!</b>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
