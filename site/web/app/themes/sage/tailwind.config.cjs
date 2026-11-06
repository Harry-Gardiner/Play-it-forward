// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {}, // Extend Tailwind's default colors
    },
    // Site fonts; also feeds the block editor font list via theme.json
    fontFamily: {
      sans: ['Jost', 'Avenir', 'Futura', '"Century Gothic"', 'Helvetica', 'Arial', 'sans-serif'],
      serif: ['Katibeh', 'Unna', '"Big Caslon"', 'Georgia', 'serif'],
      fun: ['Knewave', 'Helvetica', 'Arial', 'sans-serif'],
    },
  },
  plugins: [],
};
