# js 创建js标签

标签（空格分隔）： code

---

```
(function init(){

    var script = document.createElement('script');
    script.src = host + '/api/init.js';
    script.type = 'text/javascript';
    document.getElementsByTagName('head')[0].appendChild( script );

})();
```




