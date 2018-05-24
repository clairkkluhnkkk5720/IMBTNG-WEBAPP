module.exports = {
  dev: {
      proxy: {
          '/admin': {
              target: 'http://82.202.204.90:8000',
              changeOrigin: true,
              pathRewrite: {
                  '^/admin': ''
              }
          }
      }
  }
}