# 引入外部变量，如jquery

```javascript
module.exports = {
    entry:'./app.js',
    output:{
        filename:'bundle.js'
    },
    module:{
        loaders:[
            {
                test:/\.js[x]?$/,
                exclude:/node_module/,
                loader:'babel-loader',
                query:{
                    presets:['es2015','react']
                }
            }
        ]
    },
    externals:{
        'data':'data'
    }
}
```

## webpack hot module replace

```javascript
var webpack = require('webpack');
var path = require('path');

module.exports = {
    entry:[
        'webpack/hot/dev-server',
        'webpack-dev-server/client?http://localhost:8080',
        './app.js'
    ],
    output:{
        filename:'bundle.js'
    },
    module:{
        loaders:[
            {
                test:/\.js[x]?$/,
                exclude:/node_module/,
                loader:'babel-loader',
                query:{
                    presets:['es2015','react']
                },
                include:path.join(__dirname,'.')
            }
        ]
    },
    plugins:[
        new webpack.HotModuleReplacementPlugin()
    ]
}
```

