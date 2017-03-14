<?php

class __Mustache_ae380dc4817367845b1729d46daf6a87 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<ul>
';
        // 'articles' section
        $value = $context->find('articles');
        $buffer .= $this->section000ca20ab5bc64985188f76f8756fe4d($context, $indent, $value);
        $buffer .= $indent . '</ul>
';
        // 'articles' inverted section
        $value = $context->find('articles');
        if (empty($value)) {
            
            $buffer .= $indent . '  <p>No article available yet.</p>
';
        }

        return $buffer;
    }

    private function sectionCf50d6602a259bffe6de3feb33e0bb81(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
            {{content}}
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
                
                $buffer .= $indent . '            ';
                $value = $this->resolveValue($context->find('content'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section000ca20ab5bc64985188f76f8756fe4d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <li>
      <h2>{{title}}</h2>
      <p>
        <a href="/article/{{id}}">
          {{#truncate}}
            {{content}}
          {{/truncate}}
        </a>
      </p>
    </li>
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
                
                $buffer .= $indent . '    <li>
';
                $buffer .= $indent . '      <h2>';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</h2>
';
                $buffer .= $indent . '      <p>
';
                $buffer .= $indent . '        <a href="/article/';
                $value = $this->resolveValue($context->find('id'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                // 'truncate' section
                $value = $context->find('truncate');
                $buffer .= $this->sectionCf50d6602a259bffe6de3feb33e0bb81($context, $indent, $value);
                $buffer .= $indent . '        </a>
';
                $buffer .= $indent . '      </p>
';
                $buffer .= $indent . '    </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
