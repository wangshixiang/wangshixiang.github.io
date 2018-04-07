layout: true

# markdown 相关工具

---

## 编辑器

- 编辑器typora


---

## js 编译工具

- js编译工具 marked


---

## wiki解决方案

- 解决方案 wiki in box


---

## 幻灯片解决方案

**remark**

来源于github

使用demo：

```
<!DOCTYPE html>
<html>
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <style>
      @import url(https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz);
      @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic);
      @import url(https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic);

      body { font-family: 'Droid Serif'; }
      h1, h2, h3 {
        font-family: 'Yanone Kaffeesatz';
        font-weight: normal;
      }
      .remark-code, .remark-inline-code { font-family: 'Ubuntu Mono'; }
    </style>
  </head>
  <body>

    <script src="https://remarkjs.com/downloads/remark-latest.min.js">
    </script>
    <script>
      function getQuery(TheName){
        var urlt = window.location.href.split("?");
        if(urlt.length > 1){
          var clearurl = urlt[1].split("#");
          var gets = clearurl[0].split("&");
          for(var i=0;i<gets.length;i++){
            var get = gets[i].split("=");
            if(get[0] == TheName){
              return get[1];
            }
          }
        }
        return;
      }
      function render(url){
        return remark.create({
          sourceUrl:url
        });
      }
      var file = getQuery('name');
      if(file){
        render(file);
      } else {
        render('index.md');
      }
    </script>
  </body>
</html>
```

