验证指定元素当前是否处于焦点状态

```javascript
var focus_check = function(selector){
    this.status = false;
    this.selector = selector;
    var that = this;
    $(document).ready(function(){
        $(that.selector).focus(function(){
            that.status = true;
        });
        $(that.selector).blur(function(){
            that.status = false;
        });
    });
    this.is_focus = function(){
        return this.status;
    };
}
var product_name_focus_check = new focus_check('#product_name');
```

