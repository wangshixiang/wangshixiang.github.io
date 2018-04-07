# 一种token鉴权方式

## jwt

JSON Web Token是一种token生成方法。token中包含类型信息、一些基本信息和签名。可用一台服务其作为签名服务器用于登录及发放token。将公钥发放给其他服务器后其他服务器可以对token进行验签。获取token中包含的uid即可。

## 开源jwt 库php）

[https://github.com/lcobucci/jwt/blob/3.2/README.md](https://github.com/lcobucci/jwt/blob/3.2/README.md)

支持composer，支持rsa等多种加密方式。rsa使用公/私钥不对称加密，公钥保存于应用服务器只用于验签，泄露无风险。

## jwt 的结构组成

jwt 由3部分组成，三部分由英文句号.连接到一起。

第一部分是头部分，由编码方式，token类型组成json串后base64编码。

第二部分是payload载荷，存储了如过期时间token编码用户id等信息

第三部分是签名部分，hash后使用密钥加密后base64编码。验证时使用密钥解密，对比hash，即可完成验签。

