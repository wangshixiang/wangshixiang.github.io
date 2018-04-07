# webpack学习笔记3

[TOC]

## css的模块化

### css的模块化的意义：

css模块化可防止css的全局污染，在插入最终html的页面中的class值将被置为uuid。

react中的使用案例：

app.jsx

```jsx
const React = require('react');
const ReactDOM = require('react-dom');
var style = require('./app.css');

ReactDOM.render(
    <div>
        <h1 className={style.h1}>hello world</h1>
        <h2 className={'h2'}>hello webpack</h2>
    </div>,
    document.querySelector('#example')
);
```

webpack 配置文件：

```javascript
module.exports = {
    entry:'./app.jsx',
    output:{
        filename:'bundle.js'
    },
    module:{
        loaders:[
            {
                test:/\.js[x]?$/,
                exclude:/node_modules/,
                loader:'babel-loader',
                query:{
                    presets:['es2015','react']
                }
            },
            {
                test:/\.css$/,
                loader:'style-loader!css-loader?modules'
            }
        ]
    }
}
```

nodemodules 依赖

```json
{
  "dependencies": {
    
    "react": "^15.6.2",
    "react-dom": "^15.6.2"
  },
  "devDependencies": {
    "babel-core": "^6.26.0",
    "babel-loader": "6.x",
    "babel-preset-es2015": "^6.24.1",
    "babel-preset-react": "^6.24.1",
    "css-loader": "^0.28.7",
    "style-loader": "^0.18.2"
  }
}

```

## 使用uglifyJsPlugin插件压缩代码

配置如下

```javascript
var webpack = require('webpack');
var uglifyJsPlugin = webpack.optimize.UglifyJsPlugin;
module.exports = {
    entry:'./app.js',
    output:{
        filename:'bundle.js'
    },
    plugins:[
        new uglifyJsPlugin({
            compress:{
                warnings:false
            }
        })
    ]
};
```
## 使用html-webpack-plugin插件生成html文件

html-webpack-plugin需要安装

```javascript
var HtmlWebpackPlugin = require('html-webpack-plugin');
module.exports = {
    entry:'./app.js',
    output:{
        filename:'bundle-[hash].js'
    },
    plugins:[
        new HtmlWebpackPlugin({
            title:'demos',
            filename:'index.html'
        })
    ]
}
```

