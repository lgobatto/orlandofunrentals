module.exports = {
  extends: [
    '@roots/bud-stylelint/config',
    '@roots/bud-sass/stylelint-config',
    '@roots/bud-tailwindcss/stylelint-config/scss',
    '@roots/bud-preset-wordpress/stylelint-config',
  ],
  rules: {
    'declaration-block-no-redundant-longhand-properties': null,
    'color-no-invalid-hex': true,
    'at-rule-no-unknown': null,
    'scss/at-rule-no-unknown': null,
    'selector-class-pattern': null,
    'custom-property-pattern': null,
    'selector-id-pattern': null,
    'no-descending-specificity': null,
    'length-zero-no-unit': null,
    'media-feature-range-notation': null,
    "shorthand-property-no-redundant-values": null
  },
};
