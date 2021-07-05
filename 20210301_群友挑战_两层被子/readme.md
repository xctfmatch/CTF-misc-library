## 题目名称
两层被子

被子来源：2021-02 F5杯阿狸的密码题“简单的古典密码”

## 题目描述
两层被子（base），掀开即得flag
```
gU20I3R2iD8Sdzy1nQPkEvcrtPoS2VrqeBSW2g==
```

![](E26ADC53354C80738F7F292A4FCE8CCB.png)

题目很简单大家放心做

~~hint: 用python自带base库即可~~

## 出题/解题思路
python的base加密解密都是针对字节的，可以把字节类型flag先base**解码**，再用其他base编码一次即可。

逆向操作即可解的得flag

## flag

```
flag{base85_decode_&_base64_encode}
ctfshow{ddddddoshm?}
```
