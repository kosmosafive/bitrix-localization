<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(dirname(__DIR__, 2))
    ->exclude(
        [
            'bitrix',
            'test',
            'vendor',
            'doc',
        ]
    )
    ->notPath('/lang/');

return (new PhpCsFixer\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRiskyAllowed(true)
    ->setRules(
        [
            '@PHP84Migration' => true,
            '@PSR12' => true,
            'array_syntax' => ['syntax' => 'short'],
            'blank_line_after_namespace' => true,
            'blank_line_after_opening_tag' => true,
            'braces' => true,
            'cast_spaces' => true,
            'concat_space' => ['spacing' => 'one'],
            'declare_strict_types' => true,
            'elseif' => true,
            'encoding' => true,
            'full_opening_tag' => true,
            'function_declaration' => true,
            'function_typehint_space' => true,
            'heredoc_indentation' => true,
            'include' => true,
            'indentation_type' => true,
            'line_ending' => true,
            'lowercase_cast' => true,
            'lowercase_keywords' => true,
            'method_argument_space' => true,
            'modernize_types_casting' => true,
            'native_function_casing' => true,
            'no_blank_lines_after_class_opening' => true,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_phpdoc' => true,
            'no_extra_blank_lines' => true,
            'no_leading_import_slash' => true,
            'no_leading_namespace_whitespace' => true,
            'no_mixed_echo_print' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_short_bool_cast' => true,
            'no_singleline_whitespace_before_semicolons' => true,
            'no_spaces_after_function_name' => true,
            'no_spaces_inside_parenthesis' => true,
            'no_trailing_comma_in_singleline_array' => true,
            'no_trailing_whitespace' => true,
            'no_trailing_whitespace_in_comment' => true,
            'no_unneeded_control_parentheses' => true,
            'no_unused_imports' => true,
            'no_useless_concat_operator' => true,
            'no_useless_return' => true,
            'no_whitespace_before_comma_in_array' => true,
            'no_whitespace_in_blank_line' => true,
            'normalize_index_brace' => true,
            'object_operator_without_whitespace' => true,
            'ordered_class_elements' => [
                'order' => [
                    'use_trait',
                    'case',
                    'constant_public',
                    'constant_protected',
                    'constant_private',
                    'property_public',
                    'property_protected',
                    'property_private',
                    'construct',
                    'destruct',
                    'magic',
                    'phpunit',
                ],
            ],
            'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'function', 'const']],
            'phpdoc_align' => true,
            'phpdoc_indent' => true,
            'phpdoc_inline_tag_normalizer' => true,
            'phpdoc_no_access' => true,
            'phpdoc_no_package' => true,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_scalar' => true,
            'phpdoc_separation' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_summary' => true,
            'phpdoc_tag_type' => true,
            'phpdoc_trim' => true,
            'phpdoc_types' => true,
            'phpdoc_var_without_name' => true,
            'return_type_declaration' => true,
            'semicolon_after_instruction' => true,
            'short_scalar_cast' => true,
            'single_blank_line_at_eof' => true,
            'single_class_element_per_statement' => true,
            'single_import_per_statement' => true,
            'single_line_after_imports' => true,
            'single_trait_insert_per_statement' => true,
            'space_after_semicolon' => true,
            'standardize_not_equals' => true,
            'switch_case_space' => true,
            'ternary_operator_spaces' => true,
            'trailing_comma_in_multiline' => ['elements' => ['arrays']],
            'trim_array_spaces' => true,
            'unary_operator_spaces' => true,
            'visibility_required' => true,
            'whitespace_after_comma_in_array' => true,
        ]
    )
    ->setCacheFile(__DIR__ . '/.php_cs.cache')
    ->setFinder($finder);
