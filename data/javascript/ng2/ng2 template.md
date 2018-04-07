# ng2 template

[TOC]

## 插值表单式，变量、函数、表单时放置方法

```html
<div>{{name}}</div>
<div>{{functionName()}}</div>
<div>{{a+b}}</div>
```

## 列表循环，ngFor ngRepeat

```html
<div *ngFor="let user of users">{{user.fullName}}</div>
```

## 双向绑定

```html
<input [(ngModel)]="currentUser.firstName">
```

## 条件判断
1. ngIf,(ng1中写作ng-if)
```html
<div *ngIf="currentUser">Hello,{{currentUser.firstName}}</div>
```

2. ngSwitch

   ```html
   <span [ngSwitch]="userName">
     <span *ngSwitchCase="'张三'">张三</span>
     <span *ngSwitchCase="'李四'">李四</span>
     <span *ngSwitchCase="'王五'">王五</span>
     <span *ngSwitchCase="'赵六'">赵六</span>
     <span *ngSwitchDefault>龙大</span>
   </span>
   ```

## 事件监听

```html
<!-- phone 引用了 input 元素，并将 `value` 传递给事件句柄 -->
<input #phone placeholder="phone number">
<button (click)="callPhone(phone.value)">Call</button>
 
<!-- fax 引用了 input 元素，并将  `value` 传递给事件句柄  -->
<input ref-fax placeholder="fax number">
<button (click)="callFax(fax.value)">Fax</button>
```

## 样式绑定

```html
<div [style.font-size]="isSpecial ? 'x-large' : 'smaller'" >
  这个div是大号的。
</div>
```



