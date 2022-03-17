module.exports = {
  content: require('fast-glob').sync(['./src/**/*.js', './*.php', './pages/**/*.php']),
  theme: {
    extend: {},
  },
  plugins: [],
}
