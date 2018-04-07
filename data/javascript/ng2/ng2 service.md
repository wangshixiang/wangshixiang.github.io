# ng2 service

[TOC]

> 使用angular-cli

1. 使用angular-cli

   ```
   ng g service service-name
   ```

2. 引入http依赖和rxjs

   ```typescript
   import { Http,Response,Headers,RequestOptions } from '@angular/http';
   import 'rxjs/Rx';
   //如有自定义的诸如api服务器地址的配置文件，一并引入；
   import { config } from './config';
   ```

3. 构造函数中引入http

   > 在service文件中

   ```typescript
   @Injectable()
   export class MessageServiceService {

     	constructor(private http:Http) { }//这里<<<<<<
   ```

4. 编写请求方法，并解析结果中的json

   ```typescript
   	getList(where={}){
     		let url = config.baseURL + '/Home/Message/message';
     		return this.http.get(url,where)
     		.map((res:Response)=>res.json())
     	}
   ```

5. 在module文件中注入service

   ```typescript
   import { MessageServiceService } from './message-service.service';
   ...
   @NgModule({
     declarations: [
       AppComponent,
       MessageListComponent,
       TestComponent,
     ],
     imports: [
       router,
       BrowserModule,
       FormsModule,
       HttpModule,
       NgbModule.forRoot()
     ],
     providers: [MessageServiceService],//这里<<<<<
     bootstrap: [AppComponent]
   })
   export class AppModule { }
   ```

6. 在component中调用service

   ```typescript
   import { MessageServiceService } from '../message-service.service';
   ...
   //在component类中，构造函数中引入service
   constructor(private messageService:MessageServiceService) {
     }
   //调用
   getList(where={}){
       this.messageService.getList().subscribe(data=>{
       this.list=data.data.list
   	});
   }
   ```

   ​