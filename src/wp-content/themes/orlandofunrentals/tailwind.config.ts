export default {
  content: ['./src/**/*.{js,ts}', './views/**/*.php', './app/**/*.php'],
  theme: {
    extend: {
      colors: {
        primary: '#002554',
        secondary: '#7A785A',
        text: '#3C4343',
        accent: '#aaaaaa',
      },
      fontFamily: {
        sans: ['Montserrat', 'sans-serif'],
      },
    },
  },
  plugins: [],
  corePlugins: {
    preflight: false,
  }
}
