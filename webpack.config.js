const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  entry:  "./assets/app.js",
  mode: 'production',
  performance: {
    hints: false,
    maxEntrypointSize: 512000,
    maxAssetSize: 512000
  },
  output: {
    filename: "main.js",
    path:     path.resolve(__dirname, "public/build")
  },
  plugins: [new MiniCssExtractPlugin({filename: "style.css"})],
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use:  [
          MiniCssExtractPlugin.loader,
          "css-loader",
          "sass-loader"
        ]
      }
    ]
  }
};
