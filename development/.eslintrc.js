module.exports = {
    env: {
        browser: true,
        commonjs: true,
        es6: true
    },
    rules: {
        indent: ['error', 4],
        'linebreak-style': ['error', 'unix'],
        quotes: ['warn', 'single'],
        semi: ['error', 'always'],
        'no-unused-vars': [
            'warn',
            { vars: 'all', args: 'none', ignoreRestSiblings: false }
        ]
    }
};