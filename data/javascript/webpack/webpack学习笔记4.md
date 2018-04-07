[TOC]

## 读取环境变量，定义plugin

```javascript
var webpack = require('webpack');
var devFlagPlugin = new webpack.DefinePlugin({
    __DEV__:JSON.stringify(JSON.parse(process.env.DEBUG||'false'))
});

module.exports = {
    entry:'./app.js',
    output:{
        filename:'bundle.js'
    },
    plugins:[
        devFlagPlugin
    ]
};
```

## 拆分代码-使用require.ensure

app.js

```javascript
require.ensure(['./a.js'],function(require){
    var content = require('./a.js');
    document.open();
    document.write(content);
    document.close();
});
```

webpack.config.js照常写，自动拆分

## 拆分代码-使用bundle-loader

app.js

```javascript
var a = require('bundle-loader!./a.js');
a(function(a){
    document.open();
    document.write(a);
    document.close();
});
```

## 拆分代码-使用CommonsChunkPlugin

webpack.config.js

```javascript
var CommonsChunkPlugin = require('webpack/lib/optimize/CommonsChunkPlugin');
module.exports = {
    entry:{
        bundle1:'./app1.js',
        bundle2:'./app2.js'
    },
    output:{
        filename:'[name].js'
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
    plugins:[
        new CommonsChunkPlugin('common.js')
    ]
};
```

## 代码拆分 vendor chunk

webpack.config.js

```javascript
var webpack = require('webpack');

module.exports = {
    entry:{
        bundle:'./app.js',
        vendor:['jquery']
    },
    output:{
        filename:'bundle.js'
    },
    plugins:[
        new webpack.optimize.CommonsChunkPlugin('vendor','vendor.js'),
        // new webpack.optimize.UglifyJsPlugin({
        //     compress:{
        //         warnings:false
        //     }
        // })
    ]
};
```

