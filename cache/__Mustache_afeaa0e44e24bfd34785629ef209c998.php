<?php

class __Mustache_afeaa0e44e24bfd34785629ef209c998 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        // 'user' section
        $value = $context->find('user');
        $buffer .= $this->section05a37ca440a6517c8c339a5d7ebd8d37($context, $indent, $value);
        // 'user' inverted section
        $value = $context->find('user');
        if (empty($value)) {
            
            $buffer .= $indent . '  <h1>';
            $value = $this->resolveValue($context->findDot('article.title'), $context);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '</h1>
';
            $buffer .= $indent . '  <p>';
            $value = $this->resolveValue($context->findDot('article.content'), $context);
            $buffer .= htmlspecialchars($value, 2, 'UTF-8');
            $buffer .= '</p>
';
        }

        return $buffer;
    }

    private function section05a37ca440a6517c8c339a5d7ebd8d37(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
  <form method="post">
    <input type="hidden" name="id" value="{{article.id}}">
    <p><input type="text" name="title" placeholder="Title" value="{{article.title}}"></p>
    <p><textarea name="content">{{article.content}}</textarea></p>
    <p><button type="submit">Submit</button></p>
  </form>
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
                
                $buffer .= $indent . '  <form method="post">
';
                $buffer .= $indent . '    <input type="hidden" name="id" value="';
                $value = $this->resolveValue($context->findDot('article.id'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '">
';
                $buffer .= $indent . '    <p><input type="text" name="title" placeholder="Title" value="';
                $value = $this->resolveValue($context->findDot('article.title'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '"></p>
';
                $buffer .= $indent . '    <p><textarea name="content">';
                $value = $this->resolveValue($context->findDot('article.content'), $context);
                $buffer .= htmlspecialchars($value, 2, 'UTF-8');
                $buffer .= '</textarea></p>
';
                $buffer .= $indent . '    <p><button type="submit">Submit</button></p>
';
                $buffer .= $indent . '  </form>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
