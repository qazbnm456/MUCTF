from pwn import *
from hashpumpy import hashpump

mac, ext = hashpump('7062c015708b70b81e352f4fbd962ceb', 'icanbeatmuctf', 'givemetheflag', 14)

r = remote('127.0.0.1', 10078)

r.recvuntil('Your input :')
r.sendline(ext)
r.recvuntil('The signature :')
r.sendline(mac)

r.recvuntil('The flag is ')
print r.recv()
