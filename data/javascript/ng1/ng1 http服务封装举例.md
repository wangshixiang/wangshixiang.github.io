# angular 1.* http服务封装举例

> 以下是多表操作开放式接口封装的例子

```javascript
angular.module('caller',[])
    .provider('caller',['$httpProvider',function($httpProvider){
        var config_data = {};
        this.config = function(config){
            config_data = config;
            if(config.withCredentials === true){
                $httpProvider.defaults.withCredentials = true;
            }
        };
        var get_config = function (key) {
            if(typeof config_data[key] != 'undefined'){
                return config_data[key];
            }
            return;
        }
        var url_maker = function(uri){
        	var url = '';
        	url += get_config('baseUrl');
        	url += uri;
        	var commonParam = get_config('commonParam');
        	if(commonParam){
        		var _temp = [];
        		for(var i in commonParam){
        			_temp.push(i+'='+commonParam[i]);
        		}
        		url += '?'+ _temp.join('&');
         	}
         	return url;
        }
        this.$get = ['$http',function($http){
            return {
                get:function(uri,data){
                    var uri = uri||'';
                    var data = data||{};
                    return $http.get(url_maker(uri),{params:data});
                },
                post:function(uri,data){
                    var uri = uri||'';
                    var data = data||{};
                    return $http.post(url_maker(uri),JSON.stringify(data));
                },
                put:function(uri,data){
                    var uri = uri||'';
                    var data = data||{};
                    return $http.put(url_maker(uri),JSON.stringify(data));
                },
                delete:function(uri,data){
                    var uri = uri||'';
                    var data = data||{};
                    return $http.put(url_maker(uri),{params:data});
                }
            }
        }]
    }]);

angular.module('baas_open',['caller'])
    .provider('baas_open',['callerProvider',function(callerProvider){
        this.config = function(config){
            callerProvider.config(config);
        }
        this.$get = ['caller',function(caller){
            var open = function(caller){
                'use strict';
                var config_cache = {};
                var open_provider = function(){
                    var uri_maker = function(id){
                        if(id){
                            return 'common/openapi/'+config_cache.collection+'/'+id;
                        }
                        return 'common/openapi/'+config_cache.collection+'/';
                    };
                    this.list = function(param){
                        return caller.get(uri_maker(),param);
                    };
                    this.create = function(data){
                        return caller.post(uri_maker(),data);
                    };
                    this.find = function(id){
                        return caller.get(uri_maker(id));
                    };
                    this.update = function(id,data){
                        return caller.post(uri_maker(id),data);
                    };
                    this.delete = function(id){
                        return caller.delete(uri_maker(id));
                    };
                    return this;
                };

                this.getCollection = function(collection){
                    config_cache.collection = collection;
                    return new open_provider();
                };
                return this;
            };
            return new open(caller);
        }]
    }]);

```

