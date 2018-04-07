# jasmine

jasmine是javascript的自动化测试套件，可用于nodejs和浏览器。

浏览器中运行时，只需将少数几个jscss文件引入即可使用，配置方便

地址：[jasmine.github.io](https://jasmine.github.io)

## 安装

下载位于github上的release包，解压即可

## 使用
1. 参考SpecRunner.html，编写测试用例，引入代码。
2. 部分api:
> describe(string,function);
>
> 创建用例组，可嵌套。
>
> it(string,function)
>
> 创建单一用例
>
> expect断言
>
> 其他api参考github page

3. 异步demo

```javascript
decript('main test',function(){
  it('async test',function(done){
    setTimeout(function(){
      expect(1).toBe(1);
      done();
    },100);
  };
});
```




