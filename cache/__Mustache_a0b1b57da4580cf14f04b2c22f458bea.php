<?php

class __Mustache_a0b1b57da4580cf14f04b2c22f458bea extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<nav>
';
        $buffer .= $indent . '  <ul>
';
        $buffer .= $indent . '    <li><a href="/">Home</a></li>
';
        $buffer .= $indent . '    <li><a href="/articles">Show articles</a></li>
';
        // 'user' section
        $value = $context->find('user');
        $buffer .= $this->sectionC576476be9a2ef9f19c722b0d0c246ae($context, $indent, $value);
        $buffer .= $indent . '    <li>';
        $value = $this->resolveValue($context->find('login'), $context);
        $buffer .= $value;
        $buffer .= '</li>
';
        $buffer .= $indent . '  </ul>
';
        $buffer .= $indent . '</nav>';

        return $buffer;
    }

    private function sectionC576476be9a2ef9f19c722b0d0c246ae(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
      <li><a href="/article/new">New article</a></li>
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
                
                $buffer .= $indent . '      <li><a href="/article/new">New article</a></li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
