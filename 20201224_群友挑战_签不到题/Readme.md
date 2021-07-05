## 题目名称
签不到题

## 题目描述
```html 入门级
<script>document.getElementsByClassName("submit-row")[0].remove()</script>
flag{example}
```

```html 地狱级
<script>
var arr=document.getElementsByClassName("submit-row");
for(var j=0,len=arr.length; j < len; j++) {
  arr[j].remove();
}
</script>
flag{example}
```

```html 动态容器
<script>
document.getElementById("challenge-input").remove();
document.getElementById("challenge-submit").remove();
var arr=document.getElementsByClassName("key-submit");
for(var j=0,len=arr.length; j < len; j++) {
  arr[j].remove();
}
</script>
```

## 出题/解题思路
方法一：入门级可以在输入框之前修改或添加一个class为submit-row的元素，flag输入框就不会被删了。

方法二：api提交flag，ctfd的api还是很简单的只需要一个session
```
POST https://ctf.show/api/v1/challenges/attempt
cookie: session=xxxxxx
BODY: {challenge_id: 114514, submission: "flag{example}"}
```

方法三：打开别的题，修改一下challenge-id的value值提交即可

答案不唯一，提交成功即可

## flag
```
flag{example}
```
