/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/**/*.{html,js,php}","./app/**/*.{html,js,php}","./app/views/**/*.{html,js,php}","./app/views/pages/**/*.{html,js,php}"],
  theme: {
    extend: { backgroundImage: {
      'fundo': "url('/app/assets/img/sunrise-1634197_1280.jpg')"
    }},
  },
  plugins: [],
}

