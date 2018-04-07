# js 生成随机字符串

```javascript
function create_random_str(length){
  var lenth = length||6;
  var str = 'ABCDEFGHIGKLMNOPQRSTUVWXYZabcdefghigklmnopqrstuvwxyz0123456789';
  var getOne = function(str,str_len){
    var index = Math.floor(Math.random()*str_len);
    return str.charAt(index);
  };
  var result = '';
  for(var i =0;i<length;i++){
    result+=getOne(str,str.length);
  }
  return result;
}
console.log(create_random_str(6));

function pengzhuang(len){
  var rst = 1;
  for(var i=0;i<len;i++){
    rst*=62;
  }
  return rst*rst;
}
console.log(pengzhuang(8));//8位时的碰撞几率在10的28次方
```

