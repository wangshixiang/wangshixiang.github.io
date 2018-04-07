[TOC]

## webpack的学习资料

阮一峰在github发布的教程:

[https://github.com/ruanyf/webpack-demos#demo01-entry-file-source](https://github.com/ruanyf/webpack-demos#demo01-entry-file-source)

## 入口文件：

```javascript
module.exports = {
  entry:'./app.js'
}
```

## 输出文件

```javascript
module.exports = {
  entry:'bundle.js'
}
```

## 多文件输入输出

entry设置以json对象的形式指明其入口文件的name，输出时可在filename处使用[name]的方式调用name的值并指定输出文件文件名。

```javascript
module.exports = {
  entry:{
    bundle1:'./app1.js',
    bundle2:'./app2.js'
  },
  output:{
    filename:'[name].js'
  }
}
```

# ##webpack 使用es6和react

webpack 配置文件

```javascript
module.exports = {
    entry:'./app.jsx',//入口文件
    output:{
        filename:'bundle.js'
    },//输出文件
    module:{//模块
        loaders:[//加载器
            {//其中一个加载器
                test:/\.js[x]?$/,//匹配规则
                exclude:/node_modules/,//需要排除的目录
                loader:'babel-loader',//加载器名称
                query:{//传递给加载器的参数，也可直接写到loader字符串的后面
                    presets:['es2015','react']//参数和参数的值
                }
            }
        ]
    }
}
```

用到的依赖

```
{
  "dependencies": {
    "react": "^15.6.1",//react用到的库
    "react-dom": "^15.6.1"//react用到的react-dom库
  },
  "devDependencies": {
    "babel-core": "^6.26.0",//babel核心
    "babel-loader": "6.x",//babel加载器
    "babel-preset-es2015": "^6.24.1",//es6文件的babel预设值
    "babel-preset-react": "^6.24.1"//react文件的babel预设值
  }
}
```

