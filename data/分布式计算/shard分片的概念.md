# 数据库中shard分片的概念

以mongo db为例,mongo是一个no sql 数据库,器key值是系统生成的uuid,是一个随机字符串.

根据字符串的首字母或前几个字母,决定这条数据需要到哪一个数据库服务器进行读写.