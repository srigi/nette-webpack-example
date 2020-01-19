const path = require('path');


module.exports = {
  devServer: {
    publicPath: '/assets/',
  },
  entry: './www/js/app.js',
  mode: (process.env.NODE_ENV === 'production') ? 'production' : 'development',
  resolve: {
    extensions: ['*', '.js', '.jsx']
  },
  output: {
    filename: 'bundle.js',
    path: path.join(__dirname, 'www', 'assets'),
  },
};
