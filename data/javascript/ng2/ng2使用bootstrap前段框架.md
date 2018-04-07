# ng2使用bootstrap前段框架

[TOC]

## 安装依赖

```
cnpm i --save bootstrap@4.0.0-alpha.6
cnpm i --save @ng-bootstrap/ng-bootstrap@1.0.0-alpha.21
```

## 引入依赖

### app.module.ts

```typescript
...
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
@NgModule({
  declarations: [
    AppComponent,
    ...,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    NgbModule.forRoot()//添加到这里
  ],
  providers: [...],
  bootstrap: [AppComponent]
})
export class AppModule { }
```

### index.html

> 引入bootstrap样式表文件

```html
<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
```

## 使用

在该module下的component中即可自由使用bootstrap样式和component

### 原生使用方法

> 按照原有使用方法食用

### ng2 component

[范例及文档](https://ng-bootstrap.github.io/#/components/accordion)

