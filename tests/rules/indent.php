<?php

final class IndentRuleTest extends RuleTestCase {

    public $ruleId = 'indent';

    public function testDefault() {
        $source = <<<EOF
<?php
\$a = 'foo
bar';
if (\$a) {
echo \$a;
}
EOF;
        // case 1 (default)
        $rules = ['indent' => ['error']];
        $report = processSource($source, $rules);
        $this->assertLineColumn([[3, 1], [5, 1]], $report);
    }

    public function testString() {
        $source = <<<EOF
<?php
\$a = 'foo
bar';
\$b = "foo
bar";
\$c = "foo\$a
bar
";
\$d = <<<EOT
    foo
bar
   baz
EOT;
EOF;
        $rules = ['indent' => ['error']];
        $report = processSource($source, $rules);
        $this->assertLineColumn([[3, 1], [5, 1], [7, 1], [8, 1]], $report);
    }

}
