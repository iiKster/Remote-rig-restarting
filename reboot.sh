#!/usr/bin/python

# Rig start script 0.0.1
# iiKster - 2018.08.22

# The script is written for Raspberry Pi 2 / 3
# Force reboot a frozen mining rig remotely
# The script is intended to be used with the PHP monitoring script
# Script makes the rig think the power button is pressed for 6 sec
# released for 10 sec and then pressed for 1 sec


from __future__ import print_function

import RPi.GPIO as GPIO  # Import GPIO library
import time              # Import 'time' library. Allows us to use 'sleep'
import sys

GPIO.setmode(GPIO.BOARD) # use board pin numbering
GPIO.setup(32,GPIO.OUT)  # set 32th pin as output pin
GPIO.setup(36,GPIO.OUT)  # set 36th pin as output pin
GPIO.setup(35,GPIO.OUT)  # set 35th pin as output pin
GPIO.setup(40,GPIO.OUT)  # set 40th pin as output pin

outPin=12

input = sys.argv[1]

if input == "1":
    outPin=32
    print("one")
elif input == "2":
    outPin=40
    print("two")
elif input == "3":
    outPin=35
    print("three")
elif input == "4":
    outPin=36
    print("four")
else:
    outPin=12
    print("else")

# Shutdown
# Press the button for 1 sec, then release
GPIO.output(outPin,0)       # Press button
time.sleep(6)


GPIO.output(outPin,1)       # Release button
time.sleep(10)

# Reboot

# Press the button for 1 sec, then release
GPIO.output(outPin,0)       # Press button
time.sleep(1)           # Hold 1 sec
GPIO.output(outPin,1)       # Release button
time.sleep(1)

GPIO.cleanup()          # Clean upp GPIO stuff

