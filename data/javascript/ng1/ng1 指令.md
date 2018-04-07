# ng1 指令

```javascript
<!DOCTYPE html>
<html lang="zh" ng-app="myApp" ng-controller="main">
<head>
	<meta charset="UTF-8">
	<title>test angular directive</title>
</head>
<body>
	<div>
		<div ng-repeat="item in list">
			<first name="{{item.name}}"></first>
		</div>
	</div>
	<script src="https://cdn.staticfile.org/angular.js/1.2.32/angular.js"></script>
	<script>
		var component = angular.module('component',[]);
		component.directive('first',[function(){
			return {
				restrict:'E',
				scope:{
				},
				replace:true,
				controller:['$scope','$element','$attrs',function($scope,$element,$attrs){
					// $scope.name = $attrs.name;
					// console.log($scope.name);
					// console.log($attrs.name);
				}],
				template:'<div>\
				<input type="text" ng-model="name" />\
				<span>{{name}}</span>\
				</div>',
				// compile:function(element,attrs){
				// 	return function(scope,element,attrs){
				// 		scope.name = attrs.name;
				// 	}
				// },
				link:function(scope,element,attrs){
					scope.name = attrs.name;
				}
			};
		}]);
		var app = angular.module('myApp',['component']);
		app.controller('main',['$scope',function($scope){
			$scope.name = 'honor';
			$scope.list = [
				{
					name:'huawei'
				},
				{
					name:'honor'
				}
			];
		}]);
	</script>
</body>
</html>
```

1. 指令使用 app.directive 来书写

2. 第一个参数是指令名称，第二个参数是一个函数，函数返回一个对象

3. 对象的属性有：

   > - restrict: 取值范围ECMA E 元素；C class ；M 注释 ；a attr 属性；
   >
   > - controller：类似于app的controller，当有指令交互时使用
   >
   > - link：链接，值为function有scope，element，attrs三个属性
   >
   > - compile：编译，与link互斥，也是一个函数，参数有element，attrs，返回值是link的值，也就是包含了link的内容
   >
   > - template/templateUrl：指令的模板
   >
   > - replace：是否替换掉原指令内容，例如有个<item></item>标签，当replace的值为true时，item标签将被删除并替换成template的内容；
   >
   > - scope：
   >
   >   > - 不写时默认为false，集成父级scope
   >   > - true 时 ，继承父级scope的值，但当本级值发生改变时，不在跟踪父级scope
   >   > - {}空对象，完全独立scope，可用@，=制定某一个或若干个值继承父级scope
   >
   > - ​