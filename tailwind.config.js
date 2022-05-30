
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: require('fast-glob').sync([
    'source/**/*.{blade.php,md,html,vue}',
    '!source/**/_tmp/*' // exclude temporary files
  ], { dot: true }),
  theme: {
    extend: {
      fontFamily: {
        sans: ['Work Sans', ...defaultTheme.fontFamily.sans],
      },
      fontSize: {
        xs: '.75rem',
        sm: '.875rem',
        tiny: '.875rem',
        base: '1rem',
        lg: '1.333rem',
        xl: '1.777rem',
        '2xl': '2.369rem',
        '3xl': '3.157rem',
        '4xl': '4.209rem',
        '5xl': '5.332rem',
        '6xl': '6.665rem',
        '7xl': '7.998rem',
      },
      colors: {
        blue: {
          DEFAULT: '#0051E0',
        },
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
