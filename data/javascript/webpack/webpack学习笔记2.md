[TOC]

# webpack学习笔记2

## webpack加载css文件 

webpack加载css文件依赖两个npm库，css-loader和style-loader，其中css-loader负责读取css，style-loader负责将css样式表插入html页面。

webpack配置文件如下：

```javascript
module.exports = {
    entry: './main.js',
    output: {
      filename: 'bundle.js'
    },
    module: {
      loaders:[
        { test: /\.css$/, loader: 'style-loader!css-loader' },
      ]
    }
  };
```

## webpack 加载图片文件

加载图片文件依赖两个库file-loader和url-loader

配置文件如下，根据limit参数的配置，小鱼指定大小的图片文件将被直接base64转码。

```javascript
module.exports = {
    entry:'./app.js',
    output:{
        filename:'bundle.js'
    },
    module:{
        loaders:[
            {
                test:/\.(png|jpg)$/,
                loader:'url-loader?limit=8192'
            }
        ]
    }
}
```

app.js

```javascript
var img1 = document.createElement('img');
img1.src = require('./big.png');
document.body.appendChild(img1);
var img2 = document.createElement('img');
img2.src = require('./small.png');
document.body.appendChild(img2);
```

