# phpunit

phpunit 是php的单元测试框架

## 安装

再windows环境下

1. 下载phpunit的phar文件
2. 创建目录添加到环境变量
3. 创建phpunit.cmd
4. 将下列内容填写进cmd文件

```powershell
@php "c:\bin\phpunit-6.1.4.phar" %* 
```

5. 运行以下命令行测试

```powershell
phpunit --version
```

## 使用

```powershell
composer require --dev phpunit/phpunit ^6.1
```

1. 使用上述命令将phpunit加载到项目（根据php的版本不同需要使用不同版本的phpunit，6.1只支持php7.0以上）
2. 使用phpunit相关命令创建phpunit.xml里面记载了测试文件目录，启动文件等信息。
3. 编写测试用例文件，继承PHPUnit\Framework\TestCase。类名以Test结尾。方法名以test开头。断言函数及其他语法见手册[https://phpunit.de/manual/current/zh_cn/](https://phpunit.de/manual/current/zh_cn/)

