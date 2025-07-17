/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
        "./*.php",
    "./template-parts/**/*.php",
    "./assets/js/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Montserrat', 'sans-serif'],
      },
       colors: {
        primary: '#0D6A68',
        secondary: '#F7B11D',
        black: '#000000',
        white: '#ffffff',
      },
    },
  },
  plugins: [],
}