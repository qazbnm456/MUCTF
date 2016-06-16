#!/usr/bin/env python
import hashlib

print "I just can't remember the key of my md5 hash QAQ ......"
print "But fortunately there are still two things i can remember :"
print "(1) The length of the key is less than 32 bytes!"
print "(2) MD5(key+\"icanbeatmuctf\") = 77a5a12b9476badf3498e5291dfa0b34"
print "Give me your input & your signature, if you can succeed pass the test(i.e.,MD5(key+input) == signature), u get the flag!"

data = raw_input("Your input :")
mac = raw_input("The signature :")

c = hashlib.md5()
c.update("ucantseeme")
c.update(data)

ans = c.hexdigest()

if data != 'icanbeatmuctf' and ans == mac:
	print "Succeed!"
	print "The flag is MUCTF{Length_Extension_Attack_is_not_that_hard_isn't_it?}"
else:
	print "Failed! Either your input and sig are wrong or you copy and paste what I gave you above!"

