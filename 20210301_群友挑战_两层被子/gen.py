#!/usr/bin/python3
# coding: utf-8
import base64

def base64en(bytes):
    return base64.b64encode(bytes)

def base64de(bytes):
    return base64.b64decode(bytes)

def base85ena(bytes):
    return base64.a85encode(bytes)

def base85dea(bytes):
    return base64.a85decode(bytes)

def base85enb(bytes):
    return base64.b85encode(bytes)

def base85deb(bytes):
    return base64.b85decode(bytes)

flag = b"ctfshow{ddddddoshm?}"
# flag = b"flag{ddddddoshm_bwqbdwcs}"
res = base64en(base85deb(flag))
print(res)
res = base85enb(base64de(res))
print(res)
