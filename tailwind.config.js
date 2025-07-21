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
        black: '#303030',
        white: '#ffffff',
        drdevblue: '#111827',
        amber06: 'rgba(247,177,29,0.06)',
      },
      boxShadow: {
        custom: '0px 0px 4px 0px rgba(0, 0, 0, 0.25)',
      },
    },
  },
  plugins: [],
}