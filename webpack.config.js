const path = require('path');

module.exports = {
  entry: './assets/app.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'public/build'),
  },
};
