/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./App/**/*.{html,js,php}","./App/**/*.{html,js,php}","./App/views/**/*.{html,js,php}","./App/views/pages/**/*.{html,js,php}"],
  theme: {
    extend: { backgroundImage: {
      'fundo': "url('/App/assets/img/sunrise-1634197_1280.jpg')"
    }},
  },
  plugins: [],
}

