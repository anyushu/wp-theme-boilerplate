module.exports = {
  content: require('fast-glob').sync([
    './src/**/*.js',
    './*.php',
    './pages/**/*.php',
    './components/**/*.php',
  ]),
  theme: {
    extend: {},
  },
  plugins: [],
}
