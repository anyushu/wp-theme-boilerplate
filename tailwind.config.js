module.exports = {
  content: require('fast-glob').sync([
    './src/**/*.js',
    './*.php',
    './pages/**/*.php',
    './components/**/*.php',
  ]),
  theme: {
    extend: {
      fontFamily: {
        sans: ['Noto Sans JP', 'sans-serif'],
      },
    },
  },
  plugins: [require('@tailwindcss/typography'), require('@tailwindcss/forms')],
}
