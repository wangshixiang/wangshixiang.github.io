解决重复调取问题，限制指定时间内只执行最后一次调用

```javascript
var delay = function(){
  this.latest_id = 0;
  this.getCallId = function(){
    return Math.random();
  };
  this.main = function(time,callback){
    var that = this;
    var callId = this.getCallId();
    this.latest_id = callId;
    setTimeout(function(){
       that.go(callId,callback);
    },time);
  }
  this.go = function(callId,callback){
    var latestId = this.latest_id;
    if(callId == latestId){
      callback();
    }
  } 
};
delay_load_goods = new delay();
```

