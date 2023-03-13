/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
      fontFamily: {
          'nuni': ['Nunito', 'sans-serif'],
          'kuni': ['Kanit', 'sans-serif']
      },
    extend: {},
  },
  plugins: [],
}
