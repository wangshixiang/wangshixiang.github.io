# ng2 router 

[TOC]

## 路由配置

1. 创建路由配置文件 app.router.ts

2. 引入依赖

   ```typescript
   import { ModuleWithProviders } from '@angular/core';
   import { Routes,RouterModule } from '@angular/router';
   ```

3. 引入component

   ```typescript
   import { MessageListComponent } from './message-list/message-list.component';
   import { TestComponent } from './test/test.component';
   ```

4. 配置路由

   ```typescript
   const appRoutes:Routes = [
   	{
   		path:'',
   		component:MessageListComponent
   	},
   	{
   		path:'aaa/:id',
   		component:TestComponent
   	}
   ];
   ```

5. 输出路由

   ```typescript
   export const router:ModuleWithProviders = RouterModule.forRoot(appRoutes);
   ```

6. 在module文件中引入路由文件app.route并加入到imports中

   ```typescript
   import {router} from './app.router';
   @NgModule({
     declarations: [
       AppComponent,
       ...,
       ...,
     ],
     imports: [
       router,//这里<<<<<<<<<<<-----------
       BrowserModule,
       FormsModule,
       HttpModule,
       NgbModule.forRoot()
     ],
     providers: [MessageServiceService],
     bootstrap: [AppComponent]
   })
   export class AppModule { }
   ```

7. 在合适位置（如app.component.html）中放置闭合标签标识路由内容要嵌入的位置

   ```xml
   <router-outlet></router-outlet>
   ```

   ​

## 路由携带url param

> 在component文件中
```typescript
 import {ActivatedRoute} from "@angular/router";
   
   export class AboutList {
       urlParam: Object;
       constructor(public route:ActivatedRoute) {
           this.urlParam = {};
       }
       ngOnInit() {
           let that = this;
           this.route.params.subscribe(params => {
               that.urlParam = params  // {id: "xxx"}
           });
       }
   }
   
   
   //直接获取id值
   this.route.snapshot.params["id"]
```

## 路由跳转

> 在component文件中
```typescript
 import {Router} from "@angular/router";
    
    constructor(public router: Router) {
    // 相当于window.location.href，界面跳转
        router.navigateByUrl('home');
    }
```

