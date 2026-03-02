/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{html,js}"
  ],
  theme: {
    extend: {
      colors: {
        'tomTroc-bg': '#F5F3EF',
        'tomTroc-green': '#00AC66',
        'tomTroc-darkgreen': '#006D41',
        'tomTroc-light': '#FAF9F7',
        'tomTroc-blue': '#EDF2F6',
        'tomTroc-grey': '#A6A6A6',
        'tomTroc-darkgrey': '#292929',
      },
      fontFamily: {
        inter: ['Inter', 'sans-serif'],
        playfairDisplay: ['Playfair Display', 'serif'],
      },
      fontSize: {
        '2xs': ['0.5rem', { lineHeight: '0.75rem' }],
      },
    },
  },
  plugins: [],
}