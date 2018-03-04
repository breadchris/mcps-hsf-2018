import time, math, os
from subprocess import *

skip = True

def run(cmd):
    #print cmd
    p = Popen(cmd, shell=True, stdin=PIPE, stdout=PIPE, stderr=STDOUT, close_fds=True)
    output = p.stdout.read()
    p.kill()
    return output

duration = run("ffprobe -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 /root/ipcam/feed.mp4")
duration = int(float(duration.strip()))
interval = 0.1
if not skip:
	#os.system("rm output*")
	start = time.time()
	current = 0
	while current <= duration:
		timestamp = "00:" + "{:02d}".format(int(current) / 60) + ":{:02d}".format(int(str(current).split(".")[0]) % 60)
		#print current, timestamp
		timestamp += "." + str("%.3f"%current).split(".")[1]
		#print timestamp
		os.system("ffmpeg -ss {} -i feed.mp4 -vframes 1 output{}.jpg".format(timestamp, timestamp.replace(".", "").replace(":", "")))
		current += interval

	#print "[*] Setup complete"

start = time.time()
current = 0
last = ""
multiplier = int(1/interval)
while True:
    if int((time.time() - start) * multiplier) > int(current * multiplier):
	current = int((time.time() - start) * multiplier) / float(multiplier)
        if current >= duration:
		current = 0
		start = time.time()
	#print current
        timestamp = "00:" + "{:02d}".format(int(current) / 60) + ":{:02d}".format(int(str(current).split(".")[0]
) % 60)
        timestamp += "." + str("%.3f"%current).split(".")[1]
        #print timestamp
	#os.system("mv /var/www/html/static/output.jpg {}".format("output" + last + ".jpg"))
	os.system("cp /root/ipcam/output{}.jpg /var/www/html/static/output.jpg".format(timestamp.replace(".", "").replace(":", "")))
	#last = timestamp.replace(".", "").replace(":", "")

